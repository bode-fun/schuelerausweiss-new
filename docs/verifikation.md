# Verifikation

## Kriterien

- Session zur einfachen Anmeldung und Authentifizierung
- Keine Anmeldung für immer, denn Session verfällt nach gewisser Zeit
- Keine Speicherung von Daten

## Wie erreicht man one-time-use bei den Token?

1. Tabelle mit Token und Zeitstempel, wann der Token erstellt wurde
2. Schüler:in fragt Daten, Token und Ablaufzeit ab und bekommt einen Link für den QR Code, wo der Token sowie die unkenntlich gemachten Vor- und Nachname verschlüsselt drin stehen. Der Link ist nur einmalig nutzbar.
   1. Webseite fordert auf die Seite erneut zu laden, wenn die Zeit abgelaufen ist.
3. Verkäufer:in verifiziert den Token und fragt den Server, welcher den Token erwartet, ab.
4. Server antwortet mit Fehlerseite, wenn der Token nicht OK ist.
5. Server antwortet mit Ok und einer vom Server gerenderten Seite mit den Benutzerdaten, die im QR Code verschlüsselt encodiert waren, wenn der Token OK ist.
