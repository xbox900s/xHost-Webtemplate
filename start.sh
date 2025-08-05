#!/bin/ash

# Terminal komplett leeren vor Start
clear

# Farben im xHost-Style
BOLD="\033[1m"
DIM="\033[2m"
RESET="\033[0m"

SUCCESS="\033[38;5;82m"   # hellgrün
WARNING="\033[38;5;220m"  # goldgelb
ERROR="\033[38;5;196m"    # kräftig rot
INFO="\033[38;5;39m"      # cyanblau
GREY="\033[38;5;245m"     # grau
ORANGE="\033[38;5;208m"   # xHost Orange

# Hostname als dynamischer ServerName
SERVER_NAME=$(hostname)
PREFIX="${ORANGE}${BOLD}xHost@${SERVER_NAME}${RESET}"

# xHost Branding Banner
echo -e "${GREY}"
echo "────────────────────────────────────────────────────────────"
echo -e "${ORANGE}${BOLD}                 xʜᴏꜱᴛ  ᴡᴇʙꜱᴇʀᴠᴇʀ ʙᴏᴏᴛ${RESET}${GREY}"
echo "────────────────────────────────────────────────────────────"
echo -e "${DIM}Powered by xHost Container Runtime - Build 2025.08${RESET}"
echo ""

# Logging-Funktionen
log_success() {
    echo -e "${PREFIX} ${SUCCESS}[✔] $1${RESET}"
}
log_warning() {
    echo -e "${PREFIX} ${WARNING}[!] $1${RESET}"
}
log_error() {
    echo -e "${PREFIX} ${ERROR}[✖] $1${RESET}"
}
log_info() {
    echo -e "${PREFIX} ${INFO}[ℹ] $1${RESET}"
}

# Schritt 1: Temporäre Dateien entfernen
log_info "Bereinige temporäre Dateien in /home/container/tmp/..."
if rm -rf /home/container/tmp/*; then
    log_success "Temporäre Dateien erfolgreich entfernt."
else
    log_error "Entfernen der temporären Dateien fehlgeschlagen. Abbruch."
    exit 1
fi

# Schritt 2: PHP-FPM starten
log_info "Initialisiere PHP-FPM Dienst (php-fpm8)..."
if /usr/sbin/php-fpm8 --fpm-config /home/container/php-fpm/php-fpm.conf --daemonize; then
    log_success "PHP-FPM erfolgreich gestartet."
else
    log_error "Fehler beim Starten von PHP-FPM."
    exit 1
fi

# Schritt 3: NGINX starten
log_info "Starte NGINX Webserver mit individueller Konfiguration..."
if /usr/sbin/nginx -c /home/container/nginx/nginx.conf -p /home/container/; then
    log_success "Nginx wurde erfolgreich gestartet und hört auf Port 80."
else
    log_error "Fehler beim Starten von Nginx. Bitte prüfe die nginx.conf!"
    exit 1
fi

# Schritt 4: Startmeldung
echo ""
echo -e "${PREFIX} ${SUCCESS}${BOLD}xHost hat deinen Webserver ERFOLGREICH gestartet!${RESET}"
echo -e "${PREFIX} ${DIM}Alle Dienste laufen stabil. Logs folgen unten...${RESET}"
echo ""

# Container aktiv halten
tail -f /dev/null
