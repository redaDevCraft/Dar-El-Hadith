#  Dar El Hadith

Dar El Hadith is a modern, multilingual Laravel-based web application tailored for Islamic institutions to manage and showcase news, videos, and educational content. It comes with a responsive design, admin dashboard, and seamless localization to serve a broad user base in Arabic, English, and French.

---

##  Table of Contents

- [Features](#features)
- [Tech Stack](#tech-stack)
- [Requirements](#requirements)
- [Installation](#installation)


---

##  Features

-  **News Management**: Create, edit, delete news articles with images and video embeds.
-  **Multilingual Support**: Arabic (RTL), French, and English.
-  **Responsive Design**: Mobile-friendly and adaptable UI using Tailwind CSS.
- 🎞 **Dynamic Carousel**: Homepage carousel with latest news and headlines.
-  **Admin Dashboard**: Manage users, news, and videos via Filament.
-  **Markdown Editor**: Easily format news content using Markdown.
-  **Scroll-to-Top**: Smooth navigation experience.
-  **Dynamic Text Direction**: Auto RTL/LTR based on current locale.
-  **Docker & Sail Ready**: Run seamlessly with Laravel Sail or Docker standalone.
-  **Role-Based Access** (optional): Manage different levels of user access.

---

##  Tech Stack

- **Backend**: Laravel 10+
- **Frontend**: Blade, Tailwind CSS, Livewire.js
- **Dashboard**: [Filament Admin](https://filamentphp.com/)
- **Database**: MySQL / PostgreSQL
- **Containerization**: Docker, Laravel Sail
- **Localization**: Laravel Lang, i18n, PHP/JS files

---

##  Requirements

- Docker (Latest)
- Laravel Sail (Included)
- Node.js ^16.x
- NPM or Yarn (Latest)
- Composer (Latest)

---

##  Installation

```bash
# 1. Clone the Repository
git clone https://github.com/your-username/dar-el-hadith.git
cd dar-el-hadith

# 2. Copy .env
cp .env.example .env

# 3. Build containers with Sail (if using Sail)
./vendor/bin/sail up -d

# 4. Install dependencies
./vendor/bin/sail npm install && ./vendor/bin/sail npm run dev
./vendor/bin/sail composer install

# 5. Generate app key and migrate database
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate --seed
