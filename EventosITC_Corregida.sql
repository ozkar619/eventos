CREATE DATABASE EventosITC_Test;
USE EventosITC_Test;

CREATE TABLE evt_eventos(
    id_evento integer not null AUTO_INCREMENT,
    nombre_evento varchar(120) not null,
    contacto varchar(120) not null,
    lugar varchar(120) not null,
    informacion varchar(500) not null,
    fecha_inicio date not null,
    fecha_fin date not null,
    imagen varchar(120) not null,
    constraint evt_eventoC1 primary key evt_id_evento_PK (id_evento),
    constraint evt_eventoC2 unique (id_evento),
    constraint evt_eventoC3 check (fecha_inicio < fecha_fin)
) ENGINE=INNODB;


CREATE TABLE evt_asistentes(
    id_asistente integer not null AUTO_INCREMENT,
    nombre_asistente varchar(120) not null,
    apellido_paterno varchar(120) not null,
    apellido_materno varchar(120) not null,
    genero varchar(1) not null,
    edad integer not null,
    email varchar(30) not null,
    nctrl_rfc varchar(30) not null,
    password varchar(40) not null,
    constraint evt_asistentesC1 primary key asis_id_asistente_PK (id_asistente),
    constraint evt_asistentesC2 unique (id_asistente),
    constraint evt_asistentesC3 check (edad > 0 && edad < 80)
) ENGINE=INNODB;

CREATE TABLE evt_tipos_actividades(
    id_tipo_actividad integer not null AUTO_INCREMENT,
    tipo_actividad varchar(120),
    constraint evt_tipos_actividadesC1 primary key tipac_id_tipo_actividad_PK (id_tipo_actividad),
    constraint evt_tipos_actividadesC2 unique (id_tipo_actividad)
) ENGINE=INNODB;

CREATE TABLE evt_actividades(
    id_actividad integer not null AUTO_INCREMENT,
    id_evento integer not null,
    id_instructor integer not null,
    id_tipo_actividad integer not null,
    nombre_actividad varchar(120) not null,
    lugar varchar(120) not null,
    precio decimal not null,
    descripcion varchar(500) not null,
    fecha_inicio date not null,
    fecha_fin date not null,
    hora_inicio time not null,
    hora_fin time not null,
    imagen varchar(100),    
    constraint evt_actividadesC1 primary key act_id_actividad_PK (id_actividad),    
    constraint evt_actividadesC2 foreign key act_id_evento_FK (id_evento) references evt_eventos(id_evento),
    constraint evt_actividadesC3 foreign key act_id_instructor_FK (id_instructor) references evt_asistentes(id_asistente),
    constraint evt_actividadesC4 foreign key act_id_tipo_actividad_FK (id_tipo_actividad) references evt_tipos_actividades(id_tipo_actividad),       
    constraint evt_actividadesC5 unique (id_actividad),    
    constraint evt_actividadesC6 check (fecha_inicio < fecha_fin),
    constraint evt_actividadesC7 check (precio > 0)    
) ENGINE=INNODB;


CREATE TABLE evt_asistentes_actividades(
    id_asistente_evento integer not null AUTO_INCREMENT,
    id_asistente integer not null,
    id_actividad integer not null,
    fecha_registro date not null,
    asistio tinyint(1) not null,
    pago tinyint(1) not null,
    constraint evt_asistentes_eventosC1 primary key asac_id_asistente_evento_PK (id_asistente_evento),    
    constraint evt_asistentes_eventosC2 foreign key asac_id_asistente_FK (id_asistente) references evt_asistentes(id_asistente),
    constraint evt_asistentes_eventosC3 foreign key asac_id_actividad_FK (id_actividad) references evt_actividades(id_actividad),
    constraint evt_asistentes_eventosC4 unique (id_asistente_evento)
) ENGINE=INNODB;


CREATE TABLE evt_tipos_usuarios(
    id_tipo_usuario integer not null AUTO_INCREMENT,
    tipo varchar(120) not null,
    constraint evt_tipos_usuariosC1 primary key tipus_id_tipo_usuario_PK (id_tipo_usuario),
    constraint evt_tipos_usuariosC2 unique (id_tipo_usuario)
) ENGINE=INNODB;


CREATE TABLE evt_asistentes_tipos_usuarios(
    id_asistente_tipo_usuario integer not null AUTO_INCREMENT,
    id_asistente integer not null,
    id_tipo_usuario integer not null,
    constraint evt_asistentes_tipos_usuariosC1 primary key atu_id_asistente_tipo_usuario_PK (id_asistente_tipo_usuario),    
    constraint evt_asistentes_tipos_usuariosC2 foreign key atu_id_asistente_FK(id_asistente) references evt_asistentes(id_asistente),
    constraint evt_asistentes_tipos_usuariosC3 foreign key atu_id_tipo_usuario_FK(id_tipo_usuario) references evt_tipos_usuarios(id_tipo_usuario),
    constraint evt_asistentes_tipos_usuariosC4 unique (id_asistente_tipo_usuario)
) ENGINE=INNODB;


CREATE TABLE evt_eventos_tipos_usuarios(
    id_evento_tipo_usuario integer not null AUTO_INCREMENT,
    id_evento integer not null,
    id_asistente_tipo_usuario integer not null,
    id_tipo_usuario integer not null,
    constraint evt_eventos_tipos_usuariosC1 primary key etu_id_evento_tipo_usuario_PK (id_evento_tipo_usuario),    
    constraint evt_eventos_tipos_usuariosC2 foreign key etu_id_asistente_tipo_usuario_FK(id_asistente_tipo_usuario) references evt_asistentes_tipos_usuarios(id_asistente_tipo_usuario),    
    constraint evt_eventos_tipos_usuariosC3 foreign key etu_id_evento_FK (id_evento) references evt_eventos(id_evento),
    constraint evt_eventos_tipos_usuariosC4 foreign key etu_id_tipo_usuario_FK (id_tipo_usuario) references evt_tipos_usuarios(id_tipo_usuario),
    constraint evt_eventos_tipos_usuariosC5 unique (id_evento_tipo_usuario)
) ENGINE=INNODB;


CREATE TABLE evt_eventos_admin(
    id_evento_admin integer not null AUTO_INCREMENT,
    id_evento integer not null,
    id_asistente integer not null,
    constraint evt_eventos_adminC1 primary key evtadm_id_evento_admin_PK (id_evento_admin),
    constraint evt_eventos_adminC2 foreign key evtadm_id_evento_FK (id_evento) references evt_eventos(id_evento),
    constraint evt_eventos_adminC3 foreign key evtadm_id_asistente_FK (id_asistente) references evt_asistentes(id_asistente),
    constraint evt_eventos_adminC4 unique (id_evento_admin)
) ENGINE=INNODB;
