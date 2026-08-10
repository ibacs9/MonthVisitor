# MonthVisitor

A lightweight PHP utility script designed to track unique monthly visitors and optimize server storage by implementing an automated data purging logic.

## 🚀 Purpose & Overview
In web development, maintaining database efficiency is critical. This tool was built to provide a simple, automated solution for monitoring traffic trends on a monthly basis without hoarding unnecessary historical data. 

It tracks incoming visitor metrics and automatically clears outdated records at the start of a new billing or tracking cycle, keeping the database clean and high-performing.

## 🛠️ Tech Stack
* **Language:** PHP 7.x / 8.x
* **Database:** MySQL (for light, structured storage)
* **Concepts:** Data retention automation, Cron-job ready logic, Session/IP tracking

## ⚙️ Key Features
* **Automated Data Purging:** Automatically detects month-over-month transitions and clears the tracking table.
* **Storage Optimization:** Prevents long-term database bloating by keeping only the relevant month's data.
* **Lightweight Logic:** Designed to be easily integrated into any custom PHP backend or monolithic legacy system.

## 📦 Installation & Usage
1. Clone the repository:
   ```bash
   git clone https://github.com
   ```
2. Configure your database connection credentials inside the script.
3. Include the tracker in your application's entry point (e.g., `index.php`) or set it up as a server-side routine.
