<?php

use Illuminate\Database\Seeder;
use App\Product;
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        Product::create([
            'title'=>'Chleb dyniowy',
            'slug'=>'chleb-dyniowy',
            'summary'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium aspernatur magnam et quidem cupiditate cum ab nemo quis illum, alias dolore quia nostrum temporibus quod recusandae voluptatem maiores qui sapiente magni necessitatibus aliquam voluptas libero ex voluptatibus? Debitis voluptatum ratione impedit suscipit quam. Repellat, voluptas temporibus. Hic dolores ea quas.',
            'details'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum eaque amet, voluptate autem corrupti enim error labore eius mollitia qui consequatur reiciendis dolores nobis neque accusamus porro nisi ea omnis dolor hic illum et! Temporibus cupiditate rem iure officiis earum.',
            'rating'=>3.70,
            'price'=>2.99,
            'newprice'=>null,
            'category'=>'pieczywo',
            'isgrocery'=>1,
            'popularity'=>67,

        ]);
        
        Product::create([
            'title'=>'Jagodzianki',
            'slug'=>'jagodzianki',
            'summary'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium aspernatur magnam et quidem cupiditate cum ab nemo quis illum, alias dolore quia nostrum temporibus quod recusandae voluptatem maiores qui sapiente magni necessitatibus aliquam voluptas libero ex voluptatibus? Debitis voluptatum ratione impedit suscipit quam. Repellat, voluptas temporibus. Hic dolores ea quas.',
            'details'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum eaque amet, voluptate autem corrupti enim error labore eius mollitia qui consequatur reiciendis dolores nobis neque accusamus porro nisi ea omnis dolor hic illum et! Temporibus cupiditate rem iure officiis earum.',
            'rating'=>4.20,
            'price'=>2.99,
            'newprice'=>null,
            'category'=>'pieczywo',
            'isgrocery'=>1,
            'popularity'=>77,

        ]);
        
        Product::create([
            'title'=>'Buchty',
            'slug'=>'buchty',
            'summary'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium aspernatur magnam et quidem cupiditate cum ab nemo quis illum, alias dolore quia nostrum temporibus quod recusandae voluptatem maiores qui sapiente magni necessitatibus aliquam voluptas libero ex voluptatibus? Debitis voluptatum ratione impedit suscipit quam. Repellat, voluptas temporibus. Hic dolores ea quas.',
            'details'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum eaque amet, voluptate autem corrupti enim error labore eius mollitia qui consequatur reiciendis dolores nobis neque accusamus porro nisi ea omnis dolor hic illum et! Temporibus cupiditate rem iure officiis earum.',
            'rating'=>3.20,
            'price'=>3.99,
            'newprice'=>null,
            'category'=>'pieczywo',
            'isgrocery'=>1,
            'popularity'=>44,

        ]);

        Product::create([
            'title'=>'Chleb pszenny',
            'slug'=>'Chleb-pszenny',
            'summary'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium aspernatur magnam et quidem cupiditate cum ab nemo quis illum, alias dolore quia nostrum temporibus quod recusandae voluptatem maiores qui sapiente magni necessitatibus aliquam voluptas libero ex voluptatibus? Debitis voluptatum ratione impedit suscipit quam. Repellat, voluptas temporibus. Hic dolores ea quas.',
            'details'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum eaque amet, voluptate autem corrupti enim error labore eius mollitia qui consequatur reiciendis dolores nobis neque accusamus porro nisi ea omnis dolor hic illum et! Temporibus cupiditate rem iure officiis earum.',
            'rating'=>5.00,
            'price'=>1.99,
            'newprice'=>1.49,
            'category'=>'pieczywo',
            'isgrocery'=>1,
            'popularity'=>87,

        ]);

        Product::create([
            'title'=>'Grahamka',
            'slug'=>'Grahamka',
            'summary'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga inventore tempora culpa, adipisci, magni accusamus nulla placeat unde, laboriosam odio accusantium porro corporis ullam. Dolorem sunt in aperiam incidunt commodi iure quia molestias, reprehenderit, voluptatem doloribus exercitationem quam officiis eius.',
            'details'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia aspernatur perferendis, alias, doloremque laboriosam quia excepturi voluptate sit unde odit, quas voluptatum corporis nam veniam.',
            'rating'=>4.20,
            'price'=>0.79,
            'newprice'=>null,
            'category'=>'pieczywo',
            'isgrocery'=>1,
            'popularity'=>79,

        ]);

        Product::create([
            'title'=>'Drozdzowka',
            'slug'=>'Drozdzowka',
            'summary'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium aspernatur magnam et quidem cupiditate cum ab nemo quis illum, alias dolore quia nostrum temporibus quod recusandae voluptatem maiores qui sapiente magni necessitatibus aliquam voluptas libero ex voluptatibus? Debitis voluptatum ratione impedit suscipit quam. Repellat, voluptas temporibus. Hic dolores ea quas.',
            'details'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum eaque amet, voluptate autem corrupti enim error labore eius mollitia qui consequatur reiciendis dolores nobis neque accusamus porro nisi ea omnis dolor hic illum et! Temporibus cupiditate rem iure officiis earum.',
            'rating'=>4.70,
            'price'=>2.99,
            'newprice'=>null,
            'category'=>'pieczywo',
            'isgrocery'=>1,
            'popularity'=>69,

        ]);

        Product::create([
            'title'=>'Chleb wieloziarnisty',
            'slug'=>'Chleb-wieloziarnisty',
            'summary'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium aspernatur magnam et quidem cupiditate cum ab nemo quis illum, alias dolore quia nostrum temporibus quod recusandae voluptatem maiores qui sapiente magni necessitatibus aliquam voluptas libero ex voluptatibus? Debitis voluptatum ratione impedit suscipit quam. Repellat, voluptas temporibus. Hic dolores ea quas.',
            'details'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, in eum possimus earum quos iusto aspernatur beatae commodi aliquam tempora esse dolor? Dolorum voluptates molestiae delectus ratione sit accusamus necessitatibus.',
            'rating'=>5.00,
            'price'=>2.29,
            'newprice'=>null,
            'category'=>'pieczywo',
            'isgrocery'=>1,
            'popularity'=>45,

        ]);
            
        Product::create([
            'title'=>'Jabłko',
            'slug'=>'Jabłko',
            'summary'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium aspernatur magnam et quidem cupiditate cum ab nemo quis illum, alias dolore quia nostrum temporibus quod recusandae voluptatem maiores qui sapiente magni necessitatibus aliquam voluptas libero ex voluptatibus? Debitis voluptatum ratione impedit suscipit quam. Repellat, voluptas temporibus. Hic dolores ea quas.',
            'details'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, in eum possimus earum quos iusto aspernatur beatae commodi aliquam tempora esse dolor? Dolorum voluptates molestiae delectus ratione sit accusamus necessitatibus.',
            'rating'=>5.00,
            'price'=>0.99,
            'newprice'=>0.69,
            'category'=>'owoce',
            'isgrocery'=>1,
            'popularity'=>85,

        ]);

        Product::create([
            'title'=>'Gruszka',
            'slug'=>'Gruszka',
            'summary'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium aspernatur magnam et quidem cupiditate cum ab nemo quis illum, alias dolore quia nostrum temporibus quod recusandae voluptatem maiores qui sapiente magni necessitatibus aliquam voluptas libero ex voluptatibus? Debitis voluptatum ratione impedit suscipit quam. Repellat, voluptas temporibus. Hic dolores ea quas.',
            'details'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, in eum possimus earum quos iusto aspernatur beatae commodi aliquam tempora esse dolor? Dolorum voluptates molestiae delectus ratione sit accusamus necessitatibus.',
            'rating'=>4.00,
            'price'=>1.29,
            'newprice'=>null,
            'category'=>'owoce',
            'isgrocery'=>1,
            'popularity'=>75,

        ]);

        Product::create([
            'title'=>'Banan',
            'slug'=>'Banan',
            'summary'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium aspernatur magnam et quidem cupiditate cum ab nemo quis illum, alias dolore quia nostrum temporibus quod recusandae voluptatem maiores qui sapiente magni necessitatibus aliquam voluptas libero ex voluptatibus? Debitis voluptatum ratione impedit suscipit quam. Repellat, voluptas temporibus. Hic dolores ea quas.',
            'details'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum eaque amet, voluptate autem corrupti enim error labore eius mollitia qui consequatur reiciendis dolores nobis neque accusamus porro nisi ea omnis dolor hic illum et! Temporibus cupiditate rem iure officiis earum.',
            'rating'=>4.70,
            'price'=>1.79,
            'newprice'=>1.59,
            'category'=>'owoce',
            'isgrocery'=>1,
            'popularity'=>68,

        ]);

        Product::create([
            'title'=>'Jagody',
            'slug'=>'jagody',
            'summary'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium aspernatur magnam et quidem cupiditate cum ab nemo quis illum, alias dolore quia nostrum temporibus quod recusandae voluptatem maiores qui sapiente magni necessitatibus aliquam voluptas libero ex voluptatibus? Debitis voluptatum ratione impedit suscipit quam. Repellat, voluptas temporibus. Hic dolores ea quas.',
            'details'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum eaque amet, voluptate autem corrupti enim error labore eius mollitia qui consequatur reiciendis dolores nobis neque accusamus porro nisi ea omnis dolor hic illum et! Temporibus cupiditate rem iure officiis earum.',
            'rating'=>4.70,
            'price'=>2.99,
            'newprice'=>null,
            'category'=>'owoce',
            'isgrocery'=>1,
            'popularity'=>89,

        ]);

        Product::create([
            'title'=>'Truskawki',
            'slug'=>'Truskawki',
            'summary'=>'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusantium aspernatur magnam et quidem cupiditate cum ab nemo quis illum, alias dolore quia nostrum temporibus quod recusandae voluptatem maiores qui sapiente magni necessitatibus aliquam voluptas libero ex voluptatibus? Debitis voluptatum ratione impedit suscipit quam. Repellat, voluptas temporibus. Hic dolores ea quas.',
            'details'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum eaque amet, voluptate autem corrupti enim error labore eius mollitia qui consequatur reiciendis dolores nobis neque accusamus porro nisi ea omnis dolor hic illum et! Temporibus cupiditate rem iure officiis earum.',
            'rating'=>3.70,
            'price'=>2.99,
            'newprice'=>2.59,
            'category'=>'owoce',
            'isgrocery'=>1,
            'popularity'=>67,

        ]);

        
        Product::create([
            'title'=>'Maliny',
            'slug'=>'maliny',
            'summary'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, consequatur nihil? Dolorum eveniet dolorem consequatur dignissimos! Architecto sapiente dolores, quaerat nam ipsa nostrum saepe quae odio quis, enim nemo sint. Fuga fugiat recusandae delectus officia repellendus ipsa eos voluptate repellat.',
            'details'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum eaque amet, voluptate autem corrupti enim error labore eius mollitia qui consequatur reiciendis dolores nobis neque accusamus porro nisi ea omnis dolor hic illum et! Temporibus cupiditate rem iure officiis earum.',
            'rating'=>3.20,
            'price'=>4.99,
            'newprice'=>NULL,
            'category'=>'owoce',
            'isgrocery'=>1,
            'popularity'=>71,

        ]);
        
    }
}
