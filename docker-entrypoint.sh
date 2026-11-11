#!/bin/sh
set -e

# Fix Railway overlayfs MPM conflict (AH00534: More than one MPM loaded) at runtime
rm -f /etc/apache2/mods-enabled/mpm_event.load \
      /etc/apache2/mods-enabled/mpm_event.conf \
      /etc/apache2/mods-enabled/mpm_worker.load \
      /etc/apache2/mods-enabled/mpm_worker.conf

ln -sf /etc/apache2/mods-available/mpm_prefork.load /etc/apache2/mods-enabled/mpm_prefork.load
ln -sf /etc/apache2/mods-available/mpm_prefork.conf /etc/apache2/mods-enabled/mpm_prefork.conf
ln -sf /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load
ln -sf /etc/apache2/mods-available/headers.load /etc/apache2/mods-enabled/headers.load

# Listen on both port 80 and Railway's dynamic $PORT (if different from 80)
if [ -n "$PORT" ] && [ "$PORT" != "80" ]; then
    if ! grep -q "Listen $PORT" /etc/apache2/ports.conf; then
        echo "Listen $PORT" >> /etc/apache2/ports.conf
    fi
fi

exec apache2-foreground
