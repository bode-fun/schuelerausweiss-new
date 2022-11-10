# README

Daten:

- Vorname
- Nachname
- Geburtsdatum
- Bild
- Hash
- Klasse

Bestandateile:

- [ ] Frontend
- [ ] Webservice
  - [ ] Links aus QR Codes laufen ab?? Session???
- [ ] Zeitstempel aus Bild

Datenschutz erreicht????

## Run Ldap Server

### Requirements

- docker
- docker compose plugin

### Ldap

#### Start Ldap Server

```bash
# cd into the project root
# you might need to run this command with sudo
docker compose up -d
```

#### Login as admin

Open <http://localhost:8081> and login with `cn=admin,dc=yourOrganisation,dc=loc` and password `admin`.
