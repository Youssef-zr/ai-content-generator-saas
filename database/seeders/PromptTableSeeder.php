<?php

namespace Database\Seeders;

use App\Models\Prompt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromptTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prompts = [
            [
                "type" => "text",
                "title" => "Blog ideas",
                "description" => "Get inspiration for your next blog post with a collection of creative blog ideas. Write engaging content with ease.",
                "prompt" => "Product/Brand name: %s, Product description: %s, Tone: %s. Generate creative and attention-grabbing blog ideas with the above information and tone.",
                "max_tokens" => 0,
                "engine_id" => 7,
                "category_id" => 10,
                "tone_id" => Null,
                "questions" => [1, 2]
            ],
            [
                "type" => "text",
                "title" => "Blog intro",
                "description" => "Craft a captivating introduction for your blog that sets the tone and hooks your readers.",
                "prompt" => "Blog title: %s, About Blog: %s, Tone: %s. Write a catchy and engaging introduction for a blog post with the above information and tone. The introduction should briefly explain the topic of the blog and grab the reader's attention.",
                "max_tokens" => 0,
                "engine_id" => 7,
                "category_id" => 10,
                "tone_id" => Null,
                "questions" => [3, 5]
            ],
            [
                "type" => "text",
                "title" => "Keyword generator",
                "description" => "Boost your search engine optimization (SEO) by discovering keywords that are relevant to your content.",
                "prompt" => "Topic: %s, Tone: %s. Generate keyword suggestions for a blog post on the topic above and tone.",
                "max_tokens" => 0,
                "engine_id" => 7,
                "category_id" => 10,
                "tone_id" => Null,
                "questions" => [10]
            ],
            [
                "type" => "text",
                "title" => "Product description",
                "description" => "Create compelling product descriptions that highlight the features and benefits of your offerings.",
                "prompt" => "Product name: %s, Product description: %s, Tone: %s. Generate a persuasive product description with the above information and tone, make sure to highlight the unique features and benefits of the product and convince the reader to purchase.",
                "max_tokens" => 0,
                "engine_id" => 7,
                "category_id" => 9,
                "tone_id" => Null,
                "questions" => [2, 13]
            ],
            [
                "type" => "text",
                "title" => "Short text hook",
                "description" => "Write attention-grabbing text hooks that grab the reader's attention and make them want to read on.",
                "prompt" => "Product description: %s, Tone: %s. Generate a short text hook with the above information and tone, it should be attention-grabbing and persuasive.",
                "max_tokens" => 0,
                "engine_id" => 7,
                "category_id" => 9,
                "tone_id" => Null,
                "questions" => [2]
            ],
            [
                "type" => "text",
                "title" => "YouTube video ideas",
                "description" => "Generate ideas for your next YouTube video, from vlogs to tutorials to unboxings.",
                "prompt" => "Product description: %s, Tone: %s. Generate YouTube video ideas with the above information and tone, be creative and consider current trends and successful videos in this field.",
                "max_tokens" => 0,
                "engine_id" => 7,
                "category_id" => 8,
                "tone_id" => Null,
                "questions" => [2]
            ],
            [
                "type" => "text",
                "title" => "Instagram captions",
                "description" => "Write eye-catching captions for your Instagram posts that engage your followers and improve your visibility.",
                "prompt" => "Post details: %s, Tone: %s. Write a creative and trendy Instagram captions with the above information and tone.",
                "max_tokens" => 0,
                "engine_id" => 7,
                "category_id" => 8,
                "tone_id" => Null,
                "questions" => [14]
            ],
            [
                "type" => "text",
                "title" => "Hashtag generator",
                "description" => "Discover popular hashtags related to your niche to help your content reach a wider audience.",
                "prompt" => "Post details: %s, Tone: %s. Generate hashtags for a social media post with the above information and tone, be creative and trendy, capturing the attention of the target audience.",
                "max_tokens" => 0,
                "engine_id" => 7,
                "category_id" => 8,
                "tone_id" => Null,
                "questions" => [14]
            ],
            [
                "type" => "text",
                "title" => "Ad copy variants",
                "description" => "Create multiple variations of your ad copy to test and optimize the performance of your advertising campaigns.",
                "prompt" => "Product/Brand name: %s, Product description: %s, Tone: %s. Generate 5 ad copy variants for a social media or advertising campaign with the above information and tone, be creative and trendy, capturing the attention of the target audience.",
                "max_tokens" => 0,
                "engine_id" => 7,
                "category_id" => 7,
                "tone_id" => Null,
                "questions" => [1, 2]
            ],
            [
                "type" => "text",
                "title" => "General Ad copy",
                "description" => "Write persuasive ad copy that converts potential customers into paying customers.",
                "prompt" => "Product/Brand name: %s, Product description: %s, Tone: %s. Write ad copy for a social media or advertising campaign with the above information and tone, be creative and trendy, capturing the attention of the target audience.",
                "max_tokens" => 0,
                "engine_id" => 7,
                "category_id" => 10,
                "tone_id" => Null,
                "questions" => [1, 2]
            ],
            [
                "type" => "text",
                "title" => "Name generator",
                "description" => "Find unique and memorable names for your business, product, or brand.",
                "prompt" => "Product description: %s, Tone: %s. Generate 5 creative and trendy names for a product with the above information and tone. Consider the product's purpose, target audience, and branding when creating the names.",
                "max_tokens" => 0,
                "engine_id" => 7,
                "category_id" => 6,
                "tone_id" => Null,
                "questions" => [2]
            ],
            [
                "type" => "text",
                "title" => "Startup ideas",
                "description" => "Get inspired and explore new business opportunities with a collection of innovative startup ideas.",
                "prompt" => "I'm passionate about: %s, Tone: %s. Generate 5 creative and innovative startup ideas that align with my passions with the above information and tone.",
                "max_tokens" => 0,
                "engine_id" => 7,
                "category_id" => 6,
                "tone_id" => Null,
                "questions" => [15]
            ],
            [
                "type" => "text",
                "title" => "Love letter",
                "description" => "Write a heartfelt love letter to express your feelings to your significant other.",
                "prompt" => "For: %s, Occasion: %s, Tone: %s. Write a romantic love letter, capturing your feelings and emotions towards them with the above information and tone, while incorporating words and phrases that evoke a romantic and influential tone.",
                "max_tokens" => 0,
                "engine_id" => 7,
                "category_id" => 5,
                "tone_id" => Null,
                "questions" => [18,19]
            ],
            [
                "type" => "text",
                "title" => "Cover letter",
                "description" => "Write a compelling cover letter that showcases your skills and lands you your dream job.",
                "prompt" => "Role:%s, Experience: %s, Tone: %s. Write a cover letter for a role with the above information and tone, mentioning my experience. Please make the tone professional and persuasive.",
                "max_tokens" => 0,
                "engine_id" => 7,
                "category_id" => 5,
                "tone_id" => Null,
                "questions" => [16, 17]
            ],
            [
                "type" => "image",
                "title" => "Oil painting",
                "description" => "Replicate the look of a traditional oil painting on any image.",
                "prompt" => "Generate an oil painting-style image of: %s.",
                "max_tokens" => 0,
                "engine_id" => 7,
                "category_id" => 4,
                "tone_id" => Null,
                "questions" => [20]
            ],
            [
                "type" => "image",
                "title" => "Watercolor",
                "description" => "Add a watercolor effect to give images a dreamy, whimsical look.",
                "prompt" => "Generate a watercolor-style image of: %s.",
                "max_tokens" => 0,
                "engine_id" => 7,
                "category_id" => 4,
                "tone_id" => Null,
                "questions" => [20]
            ],
            [
                "type" => "image",
                "title" => "Sketch",
                "description" => "Create a sketch-like effect to make images appear hand-drawn.",
                "prompt" => "Generate a sketch-style image of: %s.",
                "max_tokens" => 0,
                "engine_id" => 7,
                "category_id" => 4,
                "tone_id" => Null,
                "questions" => [20]
            ],
            [
                "type" => "image",
                "title" => "Pop art",
                "description" => "Add a pop art twist to images with bold colors and patterns.",
                "prompt" => "Generate a pop art style image of: %s.",
                "max_tokens" => 0,
                "engine_id" => 7,
                "category_id" => 4,
                "tone_id" => Null,
                "questions" => [20]
            ],

        ];

        foreach ($prompts as $prompt) {
            Prompt::create($prompt);
        }
    }
}
