CREATE DATABASE Serwis3ct;
USE Serwis3ct;


CREATE TABLE Klient
(
    id_klienta int unsigned not null auto_increment,
    imie_k varchar(20) not null,
    nazwisko_k varchar(30) not null ,
    telefon_k varchar(15) not null,
    email_k varchar(50) not null,
    firma_k varchar(70) null,
    ulica_k varchar(30) not null,
    numerDomu_k varchar(5) not null,
    numerLokalu_k int unsigned not null,
    kodPocztowy_k varchar(6) not null,
    miejscowosc_k varchar(30) not null,
    PRIMARY KEY(id_klienta)
)


Engine = InnoDB default charset='utf8';

CREATE INDEX idx1 ON Klient(nazwisko_k);

CREATE TABLE Konto
(
    nazwa_loginu varchar(25) not null,
    haslo varchar(255) BINARY not null,
    data_rejestracji DATE not null,
    status_zam ENUM('A', 'N') not null DEFAULT 'N',
    PRIMARY KEY(nazwa_loginu),
    id_klienta int unsigned not null,
        CONSTRAINT konto_id_klienta_fk /* te 3 linijki tworzą jedną dlatego nie mają przecinków */
        FOREIGN KEY(id_klienta)
        REFERENCES Klient(id_klienta)
)

Engine = InnoDB default charset='utf8';


CREATE TABLE Oddzialy
(
    id_oddzialu int unsigned not null auto_increment,
    nazwa_od varchar(60) not null,
    ulica_od varchar(30) not null,
    numer_domu_od varchar(4) not null,
    numer_lokalu_od int null,
    kod_o varchar(6) not null,
    miejscowosc_o varchar(25) not null,
    telefon_o varchar(13) not null,
    email_o varchar(50) not null,
    PRIMARY KEY(id_oddzialu)
)

Engine = InnoDB default charset='utf8';


CREATE TABLE Pracownik
(
    id_pracownika int unsigned not null auto_increment,
    imie_p varchar(20) not null,
    nazwisko_p varchar(30) not null ,
    telefon_p varchar(15) not null,
    email_p varchar(50) not null,
    PRIMARY KEY(id_pracownika),
        id_oddzialu int unsigned not null,
        CONSTRAINT pracownik_id_oddzialu_fk
        FOREIGN KEY(id_oddzialu)
        REFERENCES Oddzialy(id_oddzialu)
)

Engine = InnoDB default charset='utf8';
CREATE INDEX idx2 ON Pracownik(nazwisko_p);


CREATE TABLE Sprzet
(
    id_sprzetu int unsigned not null auto_increment,
    nr_seryjny varchar(60) not null,
    producent varchar(20) not null,
    model varchar(30) not null,
    kategoria ENUM('RTV', 'AGD', 'PC'),
    PRIMARY KEY(id_sprzetu)
)

Engine = InnoDB default charset='utf8';
CREATE INDEX idx3 ON Sprzet(nr_seryjny);

CREATE TABLE Zgloszenia
(
    id_zgloszenia int unsigned not null auto_increment,
    opis_zgloszenia text not null,
    data_zgloszenia DATE not null,
    data_odbioru DATE null,
    PRIMARY KEY(id_zgloszenia),
        id_klienta int unsigned not null,
            CONSTRAINT zgloszenie_id_klienta_fk
            FOREIGN KEY(id_klienta)
            REFERENCES Klient(id_klienta),
        id_pracownika int unsigned not null,
            CONSTRAINT zgloszenie_id_pracownika_fk
            FOREIGN KEY(id_pracownika)
            REFERENCES Pracownik(id_pracownika),
        id_sprzetu int unsigned not null,
            CONSTRAINT zgloszenie_id_sprzetu_fk
            FOREIGN KEY(id_sprzetu)
            REFERENCES Sprzet(id_sprzetu)
)

Engine = InnoDB default charset='utf8';


CREATE TABLE StatusNaprawy
(
    id_statusu int unsigned not null auto_increment,
    data_zmiany DATE,
    stat ENUM('Przyjęto w oddziale', 'W trakcie naprawy', 'Gotowy do odbioru'),
    PRIMARY KEY(id_statusu),
        id_sprzetu int unsigned not null,
        CONSTRAINT status_naprawy_id_sprzetu_fk
        FOREIGN KEY(id_sprzetu)
        REFERENCES Sprzet(id_sprzetu)
)

Engine = InnoDB default charset='utf8';


CREATE TABLE CzynnosciSerwisowe
(
    id_czynnosci int unsigned not null auto_increment,
    opis_czynnosci varchar(200) not null,
    cena decimal(6,2) not null,
    PRIMARY KEY(id_czynnosci),
    id_sprzetu int unsigned not null,
        CONSTRAINT czynnosci_serwisowe_id_sprzetu_fk
        FOREIGN KEY(id_sprzetu)
        REFERENCES Sprzet(id_sprzetu)
)

Engine = InnoDB default charset='utf8';