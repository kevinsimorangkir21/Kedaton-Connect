<div align="center">
<img src="public/assets/img/cover.png" width="100%" />
<h1> Kedaton Connect </h1>

[![Library](https://img.shields.io/badge/Laravel-10.x-red)](#)
[![Github Commit](https://img.shields.io/github/commit-activity/m/kevinsimorangkir21/Kedaton-Connect)](#)
[![License](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT)
[![Github Contributors](https://img.shields.io/badge/all_contributors-2-red.svg)](#)

</div>

## **Table Of Contents**

- [**Table Of Contents**](#table-of-contents)
- [**Introduction System**](#introduction-system)
- [**Member Of Duo K**](#member-of-duo-k)
- [**Role \& Position Member Of Duo K**](#role--position-member-of-duo-k)
- [**Instalation Steps**](#instalation-steps)
  - [**Pre-Install**](#pre-install)
  - [**Intra-Install**](#intra-install)
- [**UML Diagram**](#uml-diagram)
- [**Screenshots**](#screenshots)
- [**Video Demo System**](#video-demo-system)

## **Introduction System**

Kedaton Connect is a system that can analyze Indibiz customer data with the aim of obtaining accurate and detailed data so that the data can be estimated in the future for the company. This system is also integrated with several data, making it easier to use a system. This system also consists of several different roles and access rights with the aim of good and structured use.

## **Member Of Duo K**

| [<img src="public/assets/img/Kevins.png" width="100px"/><br /><sub><b>Kevin Simorangkir</b></sub>](https://github.com/kevinsimorangkir21)<br />121140150 | [<img src="public/assets/img/Krisnaa.png" width="100px"/><br /><sub><b>Ignatius Krisna</b></sub>](https://github.com/inExcelsis1710)<br />121140037 |
|--|--|

## **Role & Position Member Of Duo K**

There are 2 members who make up Duo K with different divisions as follows:

<div align="center">

|       Name       | Initial Name | Division | Major | Role |
| :---------------: | :------: | :----: | :----: | :-----------------------: |
| Kevin Simorangkir |   KS   | BGESS | Informatics Engineering | Backend Developer |
|  Ignatius Krisna  |   IK   | MBB | Informatics Engineering | Frontend Developer |

</div>

## **Instalation Steps**

There are two main stages in installing this project. The following are the two stages:

### **Pre-Install**

At this stage is the preparation stage before installing this project with the available requirements. Here are the requirements that must be met:

<div align="center">

|   Requirement   | Version | Download Link |
| :-------------: | :-----: | :-------------: |
|     Composer    |  2.x.x  |      [Link](https://getcomposer.org/download/)      | |
|    Laravel 5    |  10.x.x |      [Link](https://laravel.com/docs/10.x)      | |
|      XAMPP      |  8.x.x  |      [Link](https://www.apachefriends.org/download.html)      | | |
|    Git Bash     |  2.x.x  |      [Link](https://git-scm.com/downloads)      | |

</div>

### **Intra-Install**

At this stage is the installation stage of this project with the available steps. Here are the installation steps:

<li> Run GitBash and <i>clone</i> this GitHub repository</li>

```bash
https://github.com/kevinsimorangkir21/TelkomAkses-Dash.git
```

<li> Open Visual Studio Code / Other Code Editors </li>

<li> Run Command Prompt / Terminal similar </li>

```bash
composer update
```

<li> Run XAMPP, create a database. Can be accessed at the following link </li>

```bash
http://localhost/phpmyadmin
```

<li> Copy .env.example / run CLI with command</li>

```bash
cp .env.example .env
```

<li> Change the file name .env.example to .env</li>

```bash
http://localhost/phpmyadmin
```

<li> Access the .env file again and change DB_DATABASE to the name of the database that was created on LocalHost </li>

<li> Run Command Prompt/Terminal again and enter</li>

```bash
php artisan migrate:fresh --seed
```

```bash
php artisan vendor:publish
```

```bash
php artisan key:generate
```

<li> To access this project on the web, run the command</li>

```bash
php artisan serve
```

## **UML Diagram**

The following is a UML diagram in the Kedaton Connect system which has been arranged in a perfect structure according to the storyline

<img src="#" />

## **Screenshots**


<img src="#" />

## **Video Demo System**

[![System Simulation](#)](#)
