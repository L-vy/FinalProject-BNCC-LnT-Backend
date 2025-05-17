<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = \App\Models\Category::all();

        $books = [
            [
                'title' => 'The Lightning Thief (Percy Jackson & the Olympians, Book 1)',
                'author' => 'Rick Riordan',
                'publisher' => 'Disney-Hyperion',
                'number_of_page' => 384,
                'price' => 13.82,
                'description' => 'This is a story about a troubled young boy who finds out his father is a Greek god, making him a demigod. He and his friends are given the task of finding and returning Zeus\'s lightning bolt as monsters from the Underworld attempt to stop them.',
                'stock' => 50,
                'category_id' => $categories->where('slug', 'Fantasy')->first()->id,
                'cover_image' => 'image/The_Lightning_Thief.jpg'
            ],
            [
                'title' => 'Beautiful Ugly',
                'author' => 'Alice Feeney',
                'publisher' => 'Flatiron Books',
                'number_of_page' => 306,
                'price' => 17.40,
                'description' => 'The book follows Grady Green, a once-successful author who retreats to a remote Scottish island after his wife Abby\'s disappearance, only to encounter unsettling events and a woman who looks exactly like his missing wife.',
                'stock' => 75,
                'category_id' => $categories->where('slug', 'Thriller')->first()->id,
                'cover_image' => 'image/Beautiful_Ugly.jpg'
            ],
            [
                'title' => 'Great Big Beautiful Life',
                'author' => 'Emily Henry',
                'publisher' => 'Random House',
                'number_of_page' => 432,
                'price' => 20.30,
                'description' => 'Two writers compete for the chance to tell the larger-than-life story of a woman with more than a couple of plot twists up her sleeve in this dazzling and sweeping novel from Emily Henry.',
                'stock' => 62,
                'category_id' => $categories->where('slug', 'Romance')->first()->id,
                'cover_image' => 'image/Great_Big_Beautiful_Life.jpg'
            ],
            [
                'title' => 'Onyx Storm (The Empyrean #3)',
                'author' => 'Rebecca Yarros',
                'publisher' => 'Red Tower Books',
                'number_of_page' => 527,
                'price' => 17.45,
                'description' => 'Onyx Storm follows Violet Sorrengail and the events after the battle of Basgiath. With the war against the Venim officially here, Violet knows there is no more time for lessons; it\'s time to take action into her own hands, even if it\'s against the orders given to her and her squad.',
                'stock' => 51,
                'category_id' => $categories->where('slug', 'Romance')->first()->id,
                'cover_image' => 'image/Onyx_Storm.jpg'
            ],
            [
                'title' => 'Sunrise on the Reaping (The Hunger Games #0.5)',
                'author' => 'Suzanne Collins',
                'publisher' => 'Scholastic, Inc.',
                'number_of_page' => 387,
                'price' => 19.17,
                'description' => 'The book tells the story of 16-year-old Haymitch Abernathy\'s journey as a tribute in the Second Quarter Quell of the Hunger Games, 50 years before the events of the first novel.',
                'stock' => 47,
                'category_id' => $categories->where('slug', 'Fantasy')->first()->id,
                'cover_image' => 'image/Sunrise_on_the_Reaping.jpg'
            ],
            [
                'title' => 'The Crash',
                'author' => 'Freida McFadden',
                'publisher' => 'Poisoned Pen Press',
                'number_of_page' => 384,
                'price' => 19.60,
                'description' => 'A gut-wrenching story of motherhood, survival, and twisted expectations, #1 New York Times bestselling author Freida McFadden delivers a snowbound thriller that will chill you to the bone.',
                'stock' => 70,
                'category_id' => $categories->where('slug', 'Thriller')->first()->id,
                'cover_image' => 'image/The_Crash.jpg'
            ],
            // Add more books...
        ];

        foreach ($books as $book) {
            \App\Models\Book::create($book);
        }
    }
}
