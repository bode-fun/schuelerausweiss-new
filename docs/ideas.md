# Ideen

## Anmeldung

- Session zur einfachen Anmeldung und speichern von Daten ohne Datenbank
  - Keine Anmeldung für immer, denn Session verfällt nach gewisser Zeit

## Wie erreicht man One Time use bei den Token?

1. Tabelle mit Token und Zeitstempel, wann diese ablaufen werden und Feld, ob sie schon reserviert sind.
2. Schüler:in fragt Token und Ablaufzeit (30min) ab und speichert diese lokal mit Namen, Klasse, etc und Prüfsumme im QR Code als parameter.
   1. Webseite fordert auf die Seite erneut zu laden, wenn die Zeit abgelaufen ist.
3. Verkäufer:in verifiziert den Token und fragt den Server, welcher den Token erwartet, ab.
4. Server antwortet mit Fehlerseite, wenn der Token nicht OK ist.
5. Server antwortet mit Ok und einer SSR Seite mit den Benutzerdaten, die im QR Code encodiert waren, wenn der Token OK ist.
   1. Keine Daten auf dem Server gespeichert.
