drop table if exists alumnos cascade;
create table alumnos(
    id bigserial constraint pk_alumnos primary key,
    nombre_alumno varchar(100) not null,
    edad numeric(2)
);

drop table if exists asignaturas cascade;
create table asignaturas(
    id bigserial constraint pk_asignaturas primary key,
    nombre_asignatura varchar(100) not null

);

drop table if exists notas cascade;
create table notas(
    id bigserial constraint pk_notas primary key,
    nota numeric(2) not null,
    alumno_id bigint not null constraint fk_notas_alumno references alumnos (id) on delete no action
                on update cascade,

    asignatura_id bigint not null constraint fk_notas_asignatura references asignaturas (id) on delete no action
                    on update cascade
);
