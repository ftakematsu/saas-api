# 🚀 SaaS API – Laravel + Angular (DDD + JWT)

Este projeto é uma **API RESTful** desenvolvida em **Laravel**, seguindo princípios de **Domain-Driven Design (DDD)**, **Clean Architecture** e autenticação via **JWT**.  
O objetivo é servir como base para um **SaaS simples, didático e escalável**, demonstrando boas práticas de arquitetura e separação de responsabilidades.

---

## 🧠 Objetivo do Projeto

- Demonstrar domínio de **arquitetura backend moderna**
- Aplicar **DDD de forma pragmática** no Laravel
- Evitar controllers “gordos”
- Separar claramente **Domain, Application e Infrastructure**
- Servir como backend para um frontend em aplicações web e mobile
- Ser facilmente extensível para **multi-tenant SaaS**

---

## 🛠️ Stack Utilizada

### Backend
- **PHP 8.2+**
- **Laravel 10/11**
- **JWT Auth (tymon/jwt-auth)**
- **MySQL**
- **Docker**

### Arquitetura
- Domain-Driven Design (DDD)
- Clean Architecture
- Repository Pattern
- Use Cases (Application Layer)
- Entities puras no Domain

---

## 🧩 Conceitos Arquiteturais

### Domain
- Contém **regras de negócio puras**
- Não conhece Laravel, Eloquent ou JWT
- Entidades são **POPOs (Plain Old PHP Objects)**

### Application (Use Cases)
- Orquestra regras de negócio
- Depende apenas de **interfaces do Domain**
- Não acessa banco, request ou response diretamente

### Infrastructure
- Implementa detalhes técnicos
- Contém Eloquent Models e Repositories
- Pode conhecer Laravel e bibliotecas externas

---

### 👨‍💻 Autor
- **Fabio Matsunaga**
- Desenvolvedor Full Stack
- Laravel • Angular • Flutter
- Arquitetura • DDD • Clean Code