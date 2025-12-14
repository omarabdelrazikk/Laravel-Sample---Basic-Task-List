# Laravel Task List Application

This is a basic task management application I built using the Laravel framework. It allows users to create, view, edit, and delete tasks, with the ability to mark them as completed or not. The app includes pagination for better navigation through tasks, form validation with visual error indicators, and a modern, responsive UI.

## Features

- Full CRUD operations for tasks (Create, Read, Update, Delete)
- Toggle task completion status with visual indicators
- Pagination on the task list
- Form validation with error messages and visual feedback
- Flash messages with dismissible alerts
- Responsive design with Tailwind CSS
- Interactive UI elements using Alpine.js
- Human-readable timestamps
- Clean, modern interface with consistent styling

## Technologies and Tools Used

I chose Laravel for its robust MVC architecture and built-in features that speed up development. Here's what I used:

- **Laravel 12**: The latest version of the framework, providing modern PHP features and security
- **PHP 8.2+**: Leveraging the latest PHP capabilities
- **MySQL**: For data persistence
- **Blade Templates**: Laravel's templating engine for clean, reusable views
- **Tailwind CSS 4**: For styling, using its utility-first approach with custom components
- **Alpine.js**: For lightweight JavaScript interactivity (dismissible alerts)
- **Vite**: For fast asset compilation and development server
- **Composer**: For PHP dependency management
- **NPM**: For frontend dependencies
- **PHPUnit**: For writing and running tests
- **Laravel Pint**: For code formatting and style consistency
- **Docker & Laravel Sail**: For containerized development environment
- **Adminer**: Database management tool included in the Docker setup

## Project Structure

The application follows Laravel's standard structure:
- Models for Task and User entities
- Route definitions using closures for simplicity
- Form requests for validation
- Blade views with a consistent layout and Tailwind styling
- Database migrations for schema management
- Factories and seeders for testing data

## Installation and Setup

To run this project locally:

1. Clone the repository
2. Install PHP dependencies: `composer install`
3. Set up environment: Copy `.env.example` to `.env` and configure your database settings
4. Generate application key: `php artisan key:generate`
5. Run database migrations: `php artisan migrate`
6. Install frontend dependencies: `npm install`
7. Build assets: `npm run build`

For development, you can use the provided scripts:
- `composer run dev` to start the server, queue worker, and Vite dev server concurrently
- Or use Laravel Sail: `./vendor/bin/sail up` for a Docker-based environment

## Usage

Once set up, visit the application in your browser. You'll be redirected to the task list page where you can:
- View all tasks with pagination (completed tasks are visually distinguished)
- Create new tasks using the styled form with validation
- Click on a task to view its details with human-readable timestamps
- Edit or delete tasks from the detail view
- Toggle completion status with a single click
- See success messages that can be dismissed with Alpine.js interactivity

The app demonstrates modern web development practices with a focus on user experience and clean code architecture.