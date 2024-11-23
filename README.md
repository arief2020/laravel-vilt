
# System Management Inventory

A personal portfolio project built to showcase my skills in developing a comprehensive inventory management system. This system focuses on managing products, tracking stock movements (in/out transactions), generating PDF reports, and visualizing data trends using interactive charts. It demonstrates my ability to create both frontend and backend components that interact seamlessly to provide a user-friendly experience.

## Table of Contents
- [System Management Inventory](#system-management-inventory)
  - [Table of Contents](#table-of-contents)
  - [Key Features:](#key-features)
  - [Tech Stack:](#tech-stack)
    - [Running Locally](#running-locally)
  - [Feedback](#feedback)
    - [Reporting Issues](#reporting-issues)
    - [Providing Suggestions](#providing-suggestions)
    - [Contact](#contact)

## Key Features:
*  **Product Management**: CRUD operations for adding, updating, deleting, and viewing product details.
* **Transaction Management**: CRUD for tracking stock-in and stock-out transactions, keeping an accurate record of inventory movements.
* **PDF Report Generation**: Automatic PDF generation for transaction summaries and inventory reports, useful for offline record-keeping or sharing.
* **Data Visualization**: Interactive stock charts using Chart.js to visualize trends in product inventory and transaction data.
* **Real-Time Stock Tracking**: Automatically update stock levels based on incoming or outgoing transactions.

## Tech Stack:
* **Frontend**: Vue.js (with Inertia.js for smooth navigation and SPA-like experience).
* **Backend**: Laravel (RESTful API for product and transaction management, PDF generation).
* **Styling**: Tailwind CSS.
* **Data Visualization**: Chart.js (for displaying stock and transaction data visually).
* **Database**: MySQL (storing product data, transactions, and inventory levels).

### Running Locally

To run this project locally on your machine, follow these steps:

 **1. Clone the Repository**

Start by cloning the repository to your local machine:

```bash
git clone https://github.com/arief2020/laravel-vilt.git
```

 **2. Navigate into the Project Directory**

Move into the project directory:

```bash
cd .\laravel-vilt\
```

**3. Copy .env**

Copy the example environment file:

```bash
cp .env.example .env
```
**4.  Run Composer**

Install the project dependencies using Composer:

```bash
composer install
```


**5.  Install Package NPM**

Install the project dependencies using Composer:

```bash
npm install
```

**6. Setting database**

Open the `.env` file and update the database configuration:
```env
...
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dbinvetorymanagement
DB_USERNAME=root
DB_PASSWORD=
...
```
**7. Generate API Key**

Generate api key
```bash
php artisan key:generate
```
**8. Run Migration and Seeder**

Run the database migrations:
```bash
php artisan migrate
```

Run the database seeder:
```bash
php artisan db:seed
```

**8. Run App**

Start the Laravel development server:
```bash
php artisan serve
```

Start the Vue Inertia:
```bash
npm run dev
```

## Feedback

I welcome and appreciate your feedback on this project. Your input is valuable and helps me improve and refine the application. Here’s how you can provide feedback or get in touch:

### Reporting Issues

If you find any bugs or issues with the project, please report them by opening a new issue on my [GitHub Issues page](https://github.com/your-username/your-repository/issues). When reporting issues, include:

-   A clear and descriptive title
-   A detailed description of the problem
-   Steps to reproduce the issue
-   Any relevant screenshots or error messages

### Providing Suggestions

If you have suggestions for new features or improvements, please feel free to share them. You can submit your suggestions by creating a new issue on my [GitHub Issues page](https://github.com/arief2020/laravel-vilt/issues) with the label `enhancement`. Be sure to provide a clear explanation of your idea and how it could enhance the project.

### Contact

For any direct feedback, questions, or general inquiries, you can reach me at:


-   **LinkedIn:** [My Linkedin Profile](https://www.linkedin.com/in/muhammad-syaifullah-al-arief/)

Thank you for your interest in my project and for taking the time to provide feedback!
