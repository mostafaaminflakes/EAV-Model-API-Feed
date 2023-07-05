<?php

namespace App\Jobs;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class JsonProductJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $chunk;

    /**
     * Create a new job instance.
     */
    public function __construct($chunk)
    {
        $this->chunk = $chunk;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->chunk as $api_product) {
            // Add products
            $product = Product::firstOrCreate([
                'name' => $api_product['name'] ?? null,
                'price' => $api_product['price'] ?? 0,
                'image' => $api_product['image'] ?? '',
                'description' => $api_product['description'] ?? '',
            ]);

            // Add variations
            $variations = $api_product['variations'];

            if (!empty($variations)) {

                foreach ($variations as $variation) {
                    // Add variations and attributes using EAV many-to-many relathionships

                    // Retrieve ProductVariant by [product_id, additional_price, quantity]
                    // or create it with [product_id, additional_price, quantity, sku, image]
                    $variant = ProductVariant::firstOrCreate([
                        'product_id' => $product->id ?? null,
                        'additional_price' => $variation['quantity'] ?? 0,
                        'quantity' => $variation['quantity'] ?? 0,
                    ], [
                        'sku' => Str::random(8),
                        'image' => $variation['image'] ?? '',
                    ]);

                    // Add variant attributes in pivot table
                    $variant->attributes()->sync([
                        1 => ['value' => $variation['color']],
                        2 => ['value' => $variation['material']]
                    ]);
                }
            }
        }
    }
}
