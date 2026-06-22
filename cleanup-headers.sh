#!/bin/bash
# Limpieza de headers obsoletos

cd /home/letras/letras.unmsm.edu.pe/public_html/wp-content/themes/theme-letras-v1

echo "🧹 Limpiando headers obsoletos..."

# Crear backup folder
mkdir -p _backups/headers-$(date +%Y%m%d)

# Mover headers viejos a backup
mv header-old*.php _backups/headers-$(date +%Y%m%d)/ 2>/dev/null
mv header-complex-backup.php _backups/headers-$(date +%Y%m%d)/ 2>/dev/null
mv header-clean.php _backups/headers-$(date +%Y%m%d)/ 2>/dev/null

# Mantener solo header.php y header-modern.php
echo "✅ Headers limpiados"
echo "📁 Backups en: _backups/headers-$(date +%Y%m%d)/"
ls -lh header*.php 2>/dev/null | awk '{print $5 "\t" $9}'
