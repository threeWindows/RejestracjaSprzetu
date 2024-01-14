CREATE DATABASE MichalAdamskiBazaSpr;
USE MichalAdamskiBazaSpr;

CREATE TABLE ksiazka (
    NrISBN varchar(30) unsigned not null auto_increment,
    tytul varchar(50) not null,
    autor varchar(30) not null,
    dataWydania DATE not null,
    cena int not null,
    cenaPromocyjna int not null,
    gatunek ENUM('basn','przygodowa','dramat','horror','edukacyjna','naukowa'),
    zdjecie varchar(20),
    dostepWMagazynie int not null,
    PRIMARY KEY(idKsiazki)
)

Engine = InnoDB default charset='utf8';

CREATE TABLE wydawnictwo (
    idWydawnictwa int unsigned not null auto_increment,
    nazwa varchar(30) not null,
    email varchar(50) not null,
    ulica varchar(25) not null,
    miasto varchar(35) not null,
    PRIMARY KEY(idWydawnictwa),
        NrISBN int unsigned not null,
        CONSTRAINT wydawnictwo_NrISBN_fk
        FOREIGN KEY(NrISBN)
        REFERENCES ksiazka(NrISBN)
)