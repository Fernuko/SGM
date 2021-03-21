CREATE TABLE `users` (
    `id` BIGINT unsigned NOT NULL auto_increment primary key,
    `name` VARCHAR(255) NOT NULL, `email` VARCHAR(255) NOT NULL,
    `email_verified_at` TIMESTAMP NULL,
    `password` VARCHAR(255) NOT NULL,
    `remember_token` VARCHAR(100) NULL,
    `created_at` TIMESTAMP NULL,
    `updated_at` TIMESTAMP NULL)
    DEFAULT character set utf8mb4 COLLATE 'utf8mb4_unicode_ci'

ALTER TABLE `users` ADD UNIQUE `users_email_unique`(`email`)

CREATE TABLE `password_resets` (
    `email` VARCHAR(255) NOT NULL,
    `token` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP NULL)
    DEFAULT character set utf8mb4 COLLATE 'utf8mb4_unicode_ci'

ALTER TABLE `password_resets` ADD INDEX `password_resets_email_index`(`email`)

CREATE TABLE `failed_jobs` (
    `id` BIGINT unsigned NOT NULL auto_increment primary key,
    `connection` TEXT NOT NULL,
    `queue` text NOT NULL, `payload` longtext NOT NULL,
    `exception` longtext NOT NULL,
    `failed_at` timestamp DEFAULT CURRENT_TIMESTAMP NOT NULL)
    DEFAULT character set utf8mb4 COLLATE 'utf8mb4_unicode_ci'

CREATE TABLE `abogados` (
    `id` BIGINT unsigned NOT NULL auto_increment primary key,
    `apellido` VARCHAR(255) NOT NULL, `nombre` VARCHAR(255) NOT NULL,
    `domicilio` VARCHAR(255) NOT NULL, `telefono` VARCHAR(255) NOT NULL,
    `matricula` int NOT NULL, `email` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP NULL,
    `updated_at` TIMESTAMP NULL)
    DEFAULT character set utf8mb4 COLLATE 'utf8mb4_unicode_ci'

ALTER TABLE `abogados` ADD UNIQUE `abogados_email_unique`(`email`)

CREATE TABLE `personas` (
    `id` BIGINT unsigned NOT NULL auto_increment primary key,
    `apellido` VARCHAR(255) NOT NULL,
    `nombre` VARCHAR(255) NOT NULL, `dni` int NOT NULL,
    `domicilio` VARCHAR(255) NOT NULL, `telefono` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP NULL,
    `updated_at` TIMESTAMP NULL)
    DEFAULT character set utf8mb4 COLLATE 'utf8mb4_unicode_ci'

ALTER TABLE `personas` ADD UNIQUE `personas_dni_unique`(`dni`)

CREATE TABLE `juzgados` (
    `id` BIGINT unsigned NOT NULL auto_increment primary key,
    `nombre` VARCHAR(255) NOT NULL, `telefono` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP NULL, `updated_at` TIMESTAMP NULL)
    DEFAULT character set utf8mb4 COLLATE 'utf8mb4_unicode_ci'

CREATE TABLE `expedientes` (
    `id` BIGINT unsigned NOT NULL auto_increment primary key,
    `caratula` VARCHAR(255) NOT NULL, `numero` int NOT NULL,
    `actor_id` BIGINT unsigned NOT NULL, `demandado_id` BIGINT unsigned NOT NULL,
    `abogado_actor_id` BIGINT unsigned NOT NULL, `abogado_demandado_id` BIGINT unsigned NOT NULL,
    `juzgado_id` BIGINT unsigned NOT NULL, `created_at` TIMESTAMP NULL, `updated_at` TIMESTAMP NULL)
    DEFAULT character set utf8mb4 COLLATE 'utf8mb4_unicode_ci'

ALTER TABLE `expedientes` ADD CONSTRAINT `expedientes_actor_id_foreign` FOREIGN KEY (`actor_id`) REFERENCES `personas` (`id`)

ALTER TABLE `expedientes` ADD CONSTRAINT `expedientes_demandado_id_foreign` FOREIGN KEY (`demandado_id`) REFERENCES `personas` (`id`)

ALTER TABLE `expedientes` ADD CONSTRAINT `expedientes_abogado_actor_id_foreign` FOREIGN KEY (`abogado_actor_id`) REFERENCES `abogados` (`id`)

ALTER TABLE `expedientes` ADD CONSTRAINT `expedientes_abogado_demandado_id_foreign` FOREIGN KEY (`abogado_demandado_id`) REFERENCES `abogados` (`id`)

ALTER TABLE `expedientes` ADD CONSTRAINT `expedientes_juzgado_id_foreign` FOREIGN KEY (`juzgado_id`) REFERENCES `juzgados` (`id`)

CREATE TABLE `tipo_cierres` (
    `id` BIGINT unsigned NOT NULL auto_increment primary key,
    `tipo_cierre` VARCHAR(255) NOT NULL, `created_at` TIMESTAMP NULL,
    `updated_at` TIMESTAMP NULL) DEFAULT character set utf8mb4 COLLATE 'utf8mb4_unicode_ci'
    `estados` (`id` BIGINT unsigned NOT NULL auto_increment primary key,
    `estado` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP NULL,
    `updated_at` TIMESTAMP NULL)
    DEFAULT character set utf8mb4 COLLATE 'utf8mb4_unicode_ci'

CREATE TABLE `mediaciones` (
    `id` BIGINT unsigned NOT NULL auto_increment primary key,
    `numero` VARCHAR(255) NOT NULL, `observaciones` VARCHAR(255) NOT NULL,
    `fecha` datetime null, `archivo` VARCHAR(255) null,
    `expediente_id` BIGINT unsigned NOT NULL,
    `tipo_cierre_id` BIGINT unsigned NOT NULL,
    `estado_id` BIGINT unsigned NOT NULL,
    `created_at` TIMESTAMP NULL,
    `updated_at` TIMESTAMP NULL)
    DEFAULT character set utf8mb4 COLLATE 'utf8mb4_unicode_ci'

ALTER TABLE `mediaciones` add CONSTRAINT `mediaciones_expediente_id_foreign` FOREIGN KEY (`expediente_id`) REFERENCES `expedientes` (`id`)

ALTER TABLE `mediaciones` add CONSTRAINT `mediaciones_tipo_cierre_id_foreign` FOREIGN KEY (`tipo_cierre_id`) REFERENCES `tipo_cierres` (`id`)

ALTER TABLE `mediaciones` add CONSTRAINT `mediaciones_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`)

CREATE TABLE `honorarios` (
    `id` BIGINT unsigned NOT NULL auto_increment primary key,
    `monto_actor` double NOT NULL,
    `monto_demandado` double NOT NULL,
    `fecha_pago_actor` date null,
    `fecha_pago_demandado` date null,
    `beneficio_actor` tinyint(1) NOT NULL DEFAULT '0',
    `beneficio_demandado` tinyint(1) NOT NULL DEFAULT '0',
    `mediacion_id` BIGINT unsigned NOT NULL,
    `created_at` TIMESTAMP NULL,
    `updated_at` TIMESTAMP NULL)
    DEFAULT character set utf8mb4 COLLATE 'utf8mb4_unicode_ci'

ALTER TABLE `honorarios` add CONSTRAINT `honorarios_mediacion_id_foreign` FOREIGN KEY (`mediacion_id`) REFERENCES `mediaciones` (`id`)
