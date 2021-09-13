use documentacion;

delete from documento_tramites;
delete from operaciones_tramites;
delete from tramites;
delete from tipo_tramites;
delete from users;
delete from tipo_usuario;

insert into tipo_usuario(id , descripcion) values 
(1 , 'Alumno' ) , 
(2, 'Administrativo');

insert into users(id, name , email , password, tipoUsuario ) values 
(1, 'Jose Delgado Deza' , 'jose@unitru.edu.pe' , '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',1) , 
(2, 'Ayrton Oscar Alfonso Soto Alarcon' , 'ayrton@unitru.edu.pe' , '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',1),
(3, 'Kenner Alexander Rojas Ahumada' , 'kenner@unitru.edu.pe' , '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',1),
(4, 'Evellyn Miles Guevara Vega' , 'evellyn@unitru.edu.pe' , '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',1),
(5, 'SECRETARIA' , 'secre@unitru.edu.pe' , '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',2);


insert into tipo_tramites(id , descripcion) values 
(1 , 'Tramite de noseque 1' ) , 
(2, 'Tramite de noseque 2'),
(3, 'Tramite de noseque 3'),
(4, 'Tramite de noseque 4'),
(5, 'Tramite de noseque 5');
insert into estado_tramites(id , descripcion) values 
(1 , 'Pendiente' ) , 
(2, 'Aceptado'),
(3, 'Rechazado');


insert into tramites(id, codigo , tipoTramite , fechaRegistro , estado , razon , usuarioRegistro) values 
(1 , '00001' ,1 , now() , 1 , 'razon noseque' , 1 ),
(2 , '00002' ,3 , now() , 1 , 'razon noseque' , 1 );

insert into operaciones_tramites(id,tramite , detalle , usuarioOrigen , rolOrigen , usuarioDestino , rolDestino, fechaInicio , fechaFin) values 
(1 , 1 , 'Tramite hecho por ...' , 1 ,'Estudiante', 2 , 'Administrativo' , '2021-06-01' , now()),
(2 , 1 , 'Tramite hecho por ...' , 3 , 'Administrativo' , 4 , 'Administrativo', now() , now());


insert into documento_tramites(id, idTramite , blob_data) values 
(1 , 1 , 'nose que se pone aqui');
