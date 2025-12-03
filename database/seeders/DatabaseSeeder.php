<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Estate;
use App\Models\Service;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        User::firstOrCreate(
            ['email' => 'eman@example.com'],
            [
                'name' => 'Eman Emad',
                'password' => Hash::make('12345678')
            ]
        );

        Setting::firstOrCreate(
            [],
            [
                'header_title' => 'Welcome to Our Real Estate',
                'header_description' => 'Premium estates and services for everyone.',
                'header_image' => 'https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg',
                'about_title' => 'About Us',
                'about_description' => 'We are a professional real estate company offering top-notch services.',
                'about_image_1' => 'https://images.pexels.com/photos/271624/pexels-photo-271624.jpeg',
                'about_image_2' => 'https://images.pexels.com/photos/259950/pexels-photo-259950.jpeg',
                'contact_address' => 'New York, USA',
                'contact_email' => 'info@example.com',
                'contact_phone' => '+1234567890',
            ]
        );

        $services = [
            [
                'name' => 'Property Cleaning',
                'description' => 'Comprehensive cleaning for all properties.',
                'image' => 'https://images.pexels.com/photos/4239098/pexels-photo-4239098.jpeg'
            ],
            [
                'name' => 'Real Estate Consulting',
                'description' => 'Professional advice for buyers and sellers.',
                'image' => 'https://images.pexels.com/photos/3184465/pexels-photo-3184465.jpeg'
            ],
            [
                'name' => 'Property Valuation',
                'description' => 'Get accurate property valuations.',
                'image' => 'https://images.pexels.com/photos/7415038/pexels-photo-7415038.jpeg'
            ],
            [
                'name' => 'Legal Assistance',
                'description' => 'Legal support for property deals.',
                'image' => 'https://images.pexels.com/photos/6077125/pexels-photo-6077125.jpeg'
            ],
            [
                'name' => 'Interior Design',
                'description' => 'Modern interior solutions for your home.',
                'image' => 'https://images.pexels.com/photos/1571460/pexels-photo-1571460.jpeg'
            ],
            [
                'name' => 'Property Management',
                'description' => 'Full management services for your property.',
                'image' => 'https://images.pexels.com/photos/1438834/pexels-photo-1438834.jpeg'
            ],
            [
                'name' => 'Home Staging',
                'description' => 'Prepare your property to attract buyers.',
                'image' => 'https://images.pexels.com/photos/276724/pexels-photo-276724.jpeg'
            ],
            [
                'name' => 'Mortgage Assistance',
                'description' => 'Help with financing your property purchase.',
                'image' => 'https://images.pexels.com/photos/4386439/pexels-photo-4386439.jpeg'
            ],
            [
                'name' => 'Renovation Services',
                'description' => 'Upgrade and renovate your property professionally.',
                'image' => 'https://images.pexels.com/photos/186077/pexels-photo-186077.jpeg'
            ],
            [
                'name' => 'Photography & Videography',
                'description' => 'High-quality visuals to market your property.',
                'image' => 'https://images.pexels.com/photos/374074/pexels-photo-374074.jpeg'
            ],
            [
                'name' => 'Landscaping',
                'description' => 'Enhance outdoor spaces and gardens.',
                'image' => 'https://images.pexels.com/photos/112890/pexels-photo-112890.jpeg'
            ],
            [
                'name' => 'Tenant Screening',
                'description' => 'Reliable checks for prospective tenants.',
                'image' => 'https://images.pexels.com/photos/4386467/pexels-photo-4386467.jpeg'
            ],
        ];

        foreach ($services as $s) {
            Service::create($s);
        }

        $blogs = [
            [
                'title' => 'New Branch Opening',
                'excerpt' => 'We have opened a new branch downtown.',
                'content' => 'We are excited to announce the opening of our new branch in the heart of downtown. This branch features state-of-the-art facilities and a team ready to assist you with all your real estate needs.',
                'image' => 'https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg'
            ],
            [
                'title' => 'Tips for Buyers',
                'excerpt' => 'How to choose the right property.',
                'content' => 'Buying a property can be overwhelming. Our expert tips will help you evaluate properties effectively, consider location, budget, and future growth to make the best decision.',
                'image' => 'https://images.pexels.com/photos/271624/pexels-photo-271624.jpeg'
            ],
            [
                'title' => 'Market Trends 2025',
                'excerpt' => 'Real estate trends you need to know.',
                'content' => 'The real estate market in 2025 shows a rise in urban developments and sustainable homes. Investors should focus on high-demand areas and emerging neighborhoods for maximum returns.',
                'image' => 'https://images.pexels.com/photos/210617/pexels-photo-210617.jpeg'
            ],
            [
                'title' => 'Luxury Homes Spotlight',
                'excerpt' => 'Exploring the finest luxury homes available.',
                'content' => 'Take a tour of the most exquisite luxury homes currently on the market. From breathtaking architecture to world-class amenities, these homes redefine elegance and comfort.',
                'image' => 'https://images.pexels.com/photos/259950/pexels-photo-259950.jpeg'
            ],
            [
                'title' => 'Investment Opportunities',
                'excerpt' => 'Best investment opportunities in the city.',
                'content' => 'Discover lucrative real estate investment opportunities in prime locations. Our insights help you identify properties with high rental yield and potential for appreciation.',
                'image' => 'https://images.pexels.com/photos/259951/pexels-photo-259951.jpeg'
            ],
            [
                'title' => 'Renovation Ideas',
                'excerpt' => 'Modern renovation ideas for your property.',
                'content' => 'Transform your home with our top renovation ideas. From modern kitchens to stylish living spaces, learn how to increase value and comfort in your property.',
                'image' => 'https://images.pexels.com/photos/271667/pexels-photo-271667.jpeg'
            ],
            [
                'title' => 'Eco-Friendly Homes',
                'excerpt' => 'Sustainable and green homes for a better future.',
                'content' => 'Explore eco-friendly homes that combine sustainability with modern design. These homes help reduce carbon footprint while maintaining luxury and comfort.',
                'image' => 'https://images.pexels.com/photos/1643383/pexels-photo-1643383.jpeg'
            ],
            [
                'title' => 'Home Security Tips',
                'excerpt' => 'How to secure your home effectively.',
                'content' => 'Protect your home with our essential security tips. From smart locks to surveillance systems, ensure your property and family remain safe at all times.',
                'image' => 'https://images.pexels.com/photos/280221/pexels-photo-280221.jpeg'
            ],
            [
                'title' => 'Commercial Properties',
                'excerpt' => 'Opportunities in commercial real estate.',
                'content' => 'Commercial properties can provide excellent returns. Learn about office spaces, retail locations, and warehouses that offer great investment potential.',
                'image' => 'https://images.pexels.com/photos/439391/pexels-photo-439391.jpeg'
            ],
            [
                'title' => 'Neighborhood Insights',
                'excerpt' => 'Discover the best neighborhoods to live in.',
                'content' => 'Find out which neighborhoods are ideal for families, professionals, and investors. Our guide includes amenities, schools, transportation, and lifestyle factors.',
                'image' => 'https://images.pexels.com/photos/373912/pexels-photo-373912.jpeg'
            ],
        ];


        foreach ($blogs as $b) {
            Blog::create($b);
        }


        $estates = [
            [
                'name' => 'Luxury Apartment in Manhattan',
                'price' => 3500000,
                'operation_type' => 'sell',
                'address' => 'Manhattan, New York',
                'area' => 120,
                'rooms' => 3,
                'bathrooms' => 2,
                'images' => [
                    'https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg',
                    'https://images.pexels.com/photos/210617/pexels-photo-210617.jpeg'
                ]
            ],
            [
                'name' => 'Cozy Family House',
                'price' => 850000,
                'operation_type' => 'rent',
                'address' => 'Brooklyn, New York',
                'area' => 90,
                'rooms' => 2,
                'bathrooms' => 1,
                'images' => [
                    'https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg',
                    'https://images.pexels.com/photos/271624/pexels-photo-271624.jpeg'
                ]
            ],
            [
                'name' => 'Modern Condo',
                'price' => 1500000,
                'operation_type' => 'sell',
                'address' => 'Queens, New York',
                'area' => 110,
                'rooms' => 2,
                'bathrooms' => 2,
                'images' => [
                    'https://images.pexels.com/photos/259950/pexels-photo-259950.jpeg'
                ]
            ],
            [
                'name' => 'Spacious Villa',
                'price' => 5000000,
                'operation_type' => 'sell',
                'address' => 'Beverly Hills, Los Angeles',
                'area' => 400,
                'rooms' => 5,
                'bathrooms' => 4,
                'images' => [
                    'https://images.pexels.com/photos/259951/pexels-photo-259951.jpeg',
                    'https://images.pexels.com/photos/259952/pexels-photo-259952.jpeg'
                ]
            ],
            [
                'name' => 'Downtown Studio',
                'price' => 2000,
                'operation_type' => 'rent',
                'address' => 'Downtown LA',
                'area' => 45,
                'rooms' => 1,
                'bathrooms' => 1,
                'images' => [
                    'https://images.pexels.com/photos/106399/pexels-photo-106399.jpeg'
                ]
            ],
            [
                'name' => 'Beachfront Apartment',
                'price' => 1200000,
                'operation_type' => 'sell',
                'address' => 'Miami Beach, FL',
                'area' => 95,
                'rooms' => 2,
                'bathrooms' => 2,
                'images' => [
                    'https://images.pexels.com/photos/271624/pexels-photo-271624.jpeg'
                ]
            ],
            [
                'name' => 'Penthouse Suite',
                'price' => 4500000,
                'operation_type' => 'sell',
                'address' => 'Chicago, IL',
                'area' => 200,
                'rooms' => 4,
                'bathrooms' => 3,
                'images' => [
                    'https://images.pexels.com/photos/210617/pexels-photo-210617.jpeg'
                ]
            ],
            [
                'name' => 'Modern Loft',
                'price' => 1800000,
                'operation_type' => 'rent',
                'address' => 'San Francisco, CA',
                'area' => 100,
                'rooms' => 2,
                'bathrooms' => 1,
                'images' => [
                    'https://images.pexels.com/photos/373912/pexels-photo-373912.jpeg'
                ]
            ],
            [
                'name' => 'Suburban Family Home',
                'price' => 950000,
                'operation_type' => 'sell',
                'address' => 'New Jersey, NJ',
                'area' => 150,
                'rooms' => 3,
                'bathrooms' => 2,
                'images' => [
                    'https://images.pexels.com/photos/439391/pexels-photo-439391.jpeg'
                ]
            ],
            [
                'name' => 'Country Cottage',
                'price' => 650000,
                'operation_type' => 'rent',
                'address' => 'Vermont, USA',
                'area' => 85,
                'rooms' => 2,
                'bathrooms' => 1,
                'images' => [
                    'https://images.pexels.com/photos/1643383/pexels-photo-1643383.jpeg'
                ]
            ],
            [
                'name' => 'Lakeview Villa',
                'price' => 3200000,
                'operation_type' => 'sell',
                'address' => 'Lake Tahoe, CA',
                'area' => 300,
                'rooms' => 4,
                'bathrooms' => 3,
                'images' => [
                    'https://images.pexels.com/photos/6077125/pexels-photo-6077125.jpeg'
                ]
            ],
            [
                'name' => 'Urban Studio',
                'price' => 2500,
                'operation_type' => 'rent',
                'address' => 'Seattle, WA',
                'area' => 50,
                'rooms' => 1,
                'bathrooms' => 1,
                'images' => [
                    'https://images.pexels.com/photos/1571460/pexels-photo-1571460.jpeg'
                ]
            ],
        ];

        foreach ($estates as $e) {
            Estate::create($e);
        }

        $contacts = [
            ['name' => 'John Doe', 'email' => 'john@example.com', 'subject' => 'Inquiry', 'message' => 'I am interested in the luxury apartment.'],
            ['name' => 'Alice Smith', 'email' => 'alice@example.com', 'subject' => 'Request', 'message' => 'Can I schedule a visit for the villa?'],
            ['name' => 'Bob Johnson', 'email' => 'bob@example.com', 'subject' => 'Support', 'message' => 'Need more info about property management services.'],
            ['name' => 'Emma Williams', 'email' => 'emma@example.com', 'subject' => 'Question', 'message' => 'What are the rent terms for the downtown studio?'],
            ['name' => 'Michael Brown', 'email' => 'michael@example.com', 'subject' => 'Inquiry', 'message' => 'Do you have more condos in Queens?'],
            ['name' => 'Sarah Parker', 'email' => 'sarah@example.com', 'subject' => 'Feedback', 'message' => 'Your website is very informative.'],
            ['name' => 'David Lee', 'email' => 'david@example.com', 'subject' => 'Inquiry', 'message' => 'Are there any discounts for first-time buyers?'],
            ['name' => 'Sophia Taylor', 'email' => 'sophia@example.com', 'subject' => 'Request', 'message' => 'Can I get a virtual tour for the penthouse suite?'],
            ['name' => 'James Wilson', 'email' => 'james@example.com', 'subject' => 'Support', 'message' => 'I am having trouble with the booking form.'],
            ['name' => 'Olivia Martinez', 'email' => 'olivia@example.com', 'subject' => 'Question', 'message' => 'What are the legal steps for buying a property?'],
            ['name' => 'Liam Anderson', 'email' => 'liam@example.com', 'subject' => 'Inquiry', 'message' => 'Do you have properties in Chicago under $500,000?'],
            ['name' => 'Isabella Thomas', 'email' => 'isabella@example.com', 'subject' => 'Request', 'message' => 'I want to schedule a visit for the beach apartment.'],
        ];

        foreach ($contacts as $c) {
            Contact::create($c);
        }
    }
}
