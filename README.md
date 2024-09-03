# SB Fund

A crowdfunding application to allow people in need receive
money from anyone interested in donating to the needy. It allow users within the community to request for donations and also allow interested users participate in donation.

## Run Locally

Clone the project

```bash
  git clone https://github.com/salamsahane/sb-fund.git
```

Go to the project directory

```bash
  cd sb-fund
```

Duplicate the `.env.example` file and rename it to `.env`. Then, replace the database section with this single line

```dotenv
  DB_CONNECTION=sqlite
```

Run the command below to start the project

```bash
  docker-compose up --build
```

Onces you see the message **ready to handle connexions** on the ternimal, without stopping the process, Access the application via [http://localhost:9000](http://localhost:9000)

![Terminal output](https://res.cloudinary.com/da7i080bo/image/upload/v1724955364/Screenshot_2024-08-29_180844_lvfv5g.png)

## Tech Stack

**Client:** Laravel Blade, Bootstrap

**Server:** Laravelv10 with PHPv8.2

## Note

This project doesn't have any payment method implemented to make or received donations. Everything is just a simulation.
