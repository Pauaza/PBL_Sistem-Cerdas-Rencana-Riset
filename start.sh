#!/bin/bash

# 1. Jalankan FastAPI (Python) di background pada port 8001 lokal
/opt/venv/bin/uvicorn app:app --host 127.0.0.1 --port 8001 &

# 2. Paksa Apache untuk mendengarkan Port dinamis dari Railway ($PORT)
sed -i "s/Listen 80/Listen ${PORT}/g" /etc/apache2/ports.conf
sed -i "s/<VirtualHost \*:80>/<VirtualHost \*:${PORT}>/g" /etc/apache2/sites-available/000-default.conf

# 3. FIX ERROR MPM: Matikan mesin yang bentrok dan pastikan mpm_prefork menyala
a2dismod mpm_event mpm_worker || true
a2enmod mpm_prefork || true

# 4. Jalankan server Apache (Laravel) di foreground
apache2-foreground