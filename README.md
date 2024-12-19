
    <h1>ImageLav</h1>
    <p>A simple Laravel application for uploading and displaying images with a modern design. Users can upload images, view them in a gallery, and delete them with a confirmation modal.</p>

    <h2>Features</h2>
    <ul>
        <li>Upload images.</li>
        <li>View images in a modern gallery with cards.</li>
        <li>Delete images with a confirmation modal.</li>
        <li>Responsive design for mobile and desktop.</li>
        <li>Display upload date as "X time ago".</li>
    </ul>

    <h2>Installation</h2>
    <p>Follow these steps to get the project up and running:</p>

    <h3>1. Clone the repository:</h3>
    <pre><code>git clone https://github.com/yourusername/imagedlav.git</code></pre>

    <h3>2. Install dependencies:</h3>
    <pre><code>cd imagedlav
composer install</code></pre>

    <h3>3. Set up the environment:</h3>
    <pre><code>cp .env.example .env
php artisan key:generate</code></pre>

    <h3>4. Set up the database:</h3>
    <pre><code>php artisan migrate</code></pre>

    <h3>5. Set up file storage:</h3>
    <pre><code>php artisan storage:link</code></pre>

    <h3>6. Cache configurations, routes, and views:</h3>
    <pre><code>php artisan config:cache
php artisan route:cache
php artisan view:cache</code></pre>

    <h3>7. Run the application:</h3>
    <pre><code>php artisan serve</code></pre>
    <p>Visit <code>http://localhost:8000</code> to use the application.</p>

    <h3>8. Upload an Image:</h3>
    <p>Visit the homepage and use the form to upload an image. The image will appear in a modern gallery with the upload date.</p>

    <h3>9. Delete an Image:</h3>
    <p>On the image cards, you will find a "Delete" button. Clicking it will show a confirmation modal to confirm the image deletion.</p>

    <h2>Directory Structure</h2>
    <pre><code>
- app/
  - Http/
    - Controllers/
      - ImageController.php         # Controller for handling image uploads and deletions
- resources/
  - views/
    - home.blade.php                # Main view with the image gallery
- routes/
  - web.php                         # Routes for the application
- storage/
  - app/
    - public/                       # Directory where images are stored
    </code></pre>

    <h2>License</h2>
    <p>This project is open-source and available under the <a href="LICENSE">MIT License</a>.</p>
