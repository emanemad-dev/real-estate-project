# Premium Real Estate Website

A fully dynamic and responsive real estate web application for showcasing properties, services, and news. The system includes a modern Bootstrap-based frontend and a complete admin dashboard built with Filament for managing all website content.

---

## 🌟 Features

### Home Page
- Dynamic Header (title, description, image)
- Estates listing with price, type (Rent / Ownership), images, details
- About section with description and images
- Services with images and descriptions
- News/Blog posts with images and excerpts
- Contact details and contact form

### Admin Dashboard (Filament)
- URL: `/admin`
- Manage Estates, Services, Blogs, Settings
- View Contact Messages
- All sections are fully connected to the frontend

---

## 🛠️ Installation

Clone the project:
```bash
git clone https://github.com/emanemad-dev/real-estate-project.git
cd real-estate-project
composer install
npm install && npm run build
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
php artisan storage:link
```

Open:
- Website → `http://localhost:8000`
- Dashboard → `http://localhost:8000/admin`

---

## 🔎 Manual Testing

- Check the Home page sections (Estates, Services, News, About, Contact)
- Submit the contact form and confirm it appears in the dashboard
- From the dashboard: add/edit/delete data and verify the changes on the frontend

*No automated tests included — testing was done manually.*

---

## 💻 Technologies Used

- Laravel 10  
- PHP 8.3  
- Bootstrap 5  
- MySQL  
- Filament Admin Panel  

---

## ✅ Notes

- All content on the Home page is dynamically managed from the dashboard  
- Responsive layout  
- Images stored in `storage/app/public`  
- Admin dashboard path: `/admin`  
