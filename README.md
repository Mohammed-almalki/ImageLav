# ImageLav

A simple Laravel application for uploading and displaying images with a modern design. Users can upload images, view them in a gallery, and delete them with a confirmation modal.

## Features

- Upload images.
- View images in a modern gallery with cards.
- Delete images with a confirmation modal.
- Responsive design for mobile and desktop.
- Display upload date as "X time ago".

## Installation

### 1. Clone the repository:
```bash
git clone https://github.com/yourusername/imagedlav.git
```

### 2. Install dependencies:
```bash
cd imagedlav
composer install
```

### 3. Set up the environment:
```bash
cp .env.example .env
```
```bash
php artisan key:generate
```

### 4. Set up the database:
```bash
php artisan migrate
```

### 5. Set up file storage:
```bash
php artisan storage:link
```

### 6. Cache configurations, routes, and views:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 7. Run the application:
```bash
php artisan serve
```

### 8. Upload an Image:
- Visit the homepage.
- Use the form to upload an image.
- The image will appear in a modern gallery with the upload date.

### 9. Delete an Image:
- On the image cards, you will find a "Delete" button.
- Clicking it will show a confirmation modal to confirm the image deletion.