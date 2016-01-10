# Oppsett av utviklingsmiljø med Vagrant

1. Kjør `git clone https://github.com/radikalportal/vagrant.git; cd vagrant`.
2. Klon radikalportal-repoet i mappen.
3. Flytt radikalportal.sql.gz og uploads-mappen til vagrant-mappen.
4. Kjør `vagrant up`.
5. Rediger hosts-filen slik at dev.radikalportal er et domene for 192.168.33.10.
6. Siden skal være klar på http://dev.radikalportal/. Alle brukernes passord har blitt satt til 123456.

For at oppsettet skal bli riktig er det nødvendig at alle filene er på plass og med riktig navn. vagrant-mappen skal se omtrent slik ut:

```
vagrant
|-- README.md
|-- Vagrantfile
|-- dev.radikalportal
|-- hosts
|-- radikalportal
|-- radikalportal.sql.gz
|-- setup.sh
|-- uploads
`-- wp-config.php
```

Maskinen blir satt om med en delt mappe slik at kodeendringer som gjøres i vagrant-mappen på vertsmaskinen blir tilgjengelig for utviklingsserveren.

## Hvordan få tak i databasen?

Kontakt tore.norderud@gmail.com.

## Hvordan få tak i uploads-mappen?

Kontakt tore.norderud@gmail.com.
