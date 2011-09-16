<?

/* Datos ficticios
*************************************************************/

$letras = array ('a','b','c','d');

$autores = array(
	1 => array('nombre' => 'Abal Gustavo', 'descripcion' => 'Un prodigio de las letras'),
	2 => array('nombre' => 'Amato Fernando', 'descripcion' => 'El gran comediante'),
	3 => array('nombre' => 'Antares Juan Carlos', 'descripcion' => 'La joven promesa'),
	4 => array('nombre' => 'Bas Gustavo', 'descripcion' => 'El grande de Colombia'),
	4 => array('nombre' => 'Besana Fernando', 'descripcion' => 'La revelacion'),
	5 => array('nombre' => 'Brown Juan Carlos', 'descripcion' => 'Un joven talento'),
	6 => array('nombre' => 'Carl John', 'descripcion' => 'Talento de exportacion'),
	7 => array('nombre' => 'Contreras Miguel', 'descripcion' => 'El poeta del sur'),
	8 => array('nombre' => 'Cubierta Marcos', 'descripcion' => 'Un grande de la literatura'),
	9 => array('nombre' => 'Dardo Matias', 'descripcion' => 'El destacado poeta'),
	10 => array('nombre' => 'Dentone Miguel', 'descripcion' => 'Un hallazgo unico'),
	11 => array('nombre' => 'Durte Mariano', 'descripcion' => 'Un escritor complejo')
);

$colecciones = array(
	1 => array('nombre' => 'La lengua', 'descripcion' => 'Lo mejor de la literatura'),
	2 => array('nombre' => 'El otro lado', 'descripcion' => 'Lecturas alternativas'),
	3 => array('nombre' => 'En escena', 'descripcion' => 'Lo mejor del teatro'),
	4 => array('nombre' => 'Los sentidos', 'descripcion' => 'Novelas para disfrutar'),
	5 => array('nombre' => 'Biografias y testimonios', 'descripcion' => 'Historias de vida'),
	6 => array('nombre' => 'Filosofia e historia', 'descripcion' => 'Lo mejor del pensamiento latino'),
	7 => array('nombre' => 'Narrativas', 'descripcion' => 'Cuentos y mucho mas'),
	8 => array('nombre' => 'Temas y debates', 'descripcion' => 'Para opinar sobre nuestra region'),
	9 => array('nombre' => 'P&iacute;pala', 'descripcion' => 'Para los mas chicos')
);

$generos = array(
	1 => array('nombre' => 'Manuales', 'descripcion' => 'Libros para aprender'),
	2 => array('nombre' => 'Ensayo', 'descripcion' => 'Libros para pensar'),
	3 => array('nombre' => 'Poesia', 'descripcion' => 'Versos para volar'),
	4 => array('nombre' => 'Novela', 'descripcion' => 'Relatos para imaginar'),
	5 => array('nombre' => 'Cuento', 'descripcion' => 'Historias para sentir'),
	6 => array('nombre' => 'Cronica', 'descripcion' => 'Textos de vida')
);

$books = array(
	array('titulo' => 'Animal Farm', 'autor' => 'George Orwell', 'fecha' => '1985', 'descripcion' => 'All times classic', 'rating' => '5', 'precio' => 79),
	array('titulo' => 'The Dead Zone', 'autor' => 'Stephen King', 'fecha' => '1979', 'descripcion' => 'A must read', 'rating' => '4', 'precio' => 79),
	array('titulo' => 'Harry Potter and the Deadly Hollows', 'autor' => 'J. K. Rowling', 'fecha' => '2007', 'descripcion' => 'The saga\'s great end',  'rating' => '4', 'precio' => 79),
	array('titulo' => 'Second Foundation', 'autor' => 'Isaac Asimov', 'fecha' => '1953', 'descripcion' => 'The science fiction epic novel', 'rating' => '3', 'precio' => 79),
	array('titulo' => 'The Adventures of Tom Sawyer', 'autor' => 'Mark Twain', 'fecha' => '1876', 'descripcion' => 'The great journey', 'rating' => '5', 'precio' => 79),
	array('titulo' => 'The Black Cat', 'autor' => 'Edgar Allan Poe', 'fecha' => '1843', 'descripcion' => 'The masterpiece of Poe', 'rating' => '5', 'precio' => 79),
	array('titulo' => 'Murder on the Orient Express', 'autor' => 'Agatha Christie', 'fecha' => '1934', 'descripcion' => 'The mistery begins', 'rating' => '5', 'precio' => 79),
	array('titulo' => 'The Plague', 'autor' => 'Albert Camus', 'fecha' => '1947', 'descripcion' => 'A great novel', 'rating' => '3', 'precio' => 79)
);

$book = array(
	'id_libro' => 42,
	'titulo' => 'El cuento de cuatro ni&ntilde;os que dieron la vuelta al mundo',
	'autor' => 'Edward Lear',
	'imagen' => 'cover01.jpg',
	'precio' => number_format(79, 2, ',', '.'),
	'subtitulo' => 'Traducci&oacute;n y colecci&oacute;n de Eduardo Barti.',
	'genero' => 'Cuentos',
	'isbn' => '908-9089-90-67',
	'descripcion' => '<p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo <em>Contenido aqu&iacute;, contenido aqu&iacute;</em>. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer.<br><br>Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto.</p><p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo <em>Contenido aqu&iacute;, contenido aqu&iacute;</em>. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer.<br><br>Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto.</p>',
	'prensa' => array(
		array(
			'comentario' => 'Recorre los relatos m&aacute;s interesantes de la literatura infantil actual',
			'emisor' => 'Lucas Perez',
			'medio' => 'La Naci&oacute;n'
		),
		array(
			'comentario' => 'Deliciosas aventuras para compartir en familia',
			'emisor' => 'Juan Gonzalez',
			'medio' => 'Clar&iacute;n'
		),
		array(
			'comentario' => 'Relatos refrescantes para los chicos de hoy',
			'emisor' => 'Isabel Belgrano',
			'medio' => 'Revista Genios'
		)
	)
);

$noticias_ejemplo = array(
	2010 => array(
		1 => array(
			'id_noticia' => 1,
			'titulo' => 'Presentaci&oacute;n del libro &#8220;Desarrollo Sustentable&#8221;',
			'ctime' => '2010-03-30',
			'texto' => '<p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo <em>Contenido aqu&iacute;, contenido aqu&iacute;</em>. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer.<br><br>Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto.</p><p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo <em>Contenido aqu&iacute;, contenido aqu&iacute;</em>. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer.<br><br>Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto.</p>',
			'imagen' => 'noticia01.jpg'
		),
		2 => array(
			'id_noticia' => 2,
			'titulo' => 'Un libro de cuentos chileno es premiado en Europa',
			'ctime' => '2010-04-30',
			'texto' => '<p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo <em>Contenido aqu&iacute;, contenido aqu&iacute;</em>. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer.<br><br>Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto.</p><p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo <em>Contenido aqu&iacute;, contenido aqu&iacute;</em>. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer.<br><br>Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto.</p>',
			'imagen' => 'noticia01.jpg'
		),
		3 => array(
			'id_noticia' => 3,
			'titulo' => 'Miles de lectores esperan la salida del tercer tomo de Rey Arturo',
			'ctime' => '2010-05-30',
			'texto' => '<p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo <em>Contenido aqu&iacute;, contenido aqu&iacute;</em>. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer.<br><br>Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto.</p><p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo <em>Contenido aqu&iacute;, contenido aqu&iacute;</em>. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer.<br><br>Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto.</p>',
			'imagen' => 'noticia01.jpg'
		),
		4 => array(
			'id_noticia' => 4,
			'titulo' => 'Festejan cumplea&ntilde;os de Benedetti con entrega de premios en su nombre',
			'ctime' => '2010-03-30',
			'texto' => '<p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo <em>Contenido aqu&iacute;, contenido aqu&iacute;</em>. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer.<br><br>Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto.</p><p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo <em>Contenido aqu&iacute;, contenido aqu&iacute;</em>. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer.<br><br>Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto.</p>',
			'imagen' => 'noticia01.jpg'
		),
		5 => array(
			'id_noticia' => 5,
			'titulo' => 'Necesidad de contar historias reales desde la subjetividad: Magali Tercero',
			'ctime' => '2010-04-30',
			'texto' => '<p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo <em>Contenido aqu&iacute;, contenido aqu&iacute;</em>. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer.<br><br>Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto.</p><p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo <em>Contenido aqu&iacute;, contenido aqu&iacute;</em>. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer.<br><br>Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto.</p>',
			'imagen' => 'noticia01.jpg'
		),
		6 => array(
			'id_noticia' => 6,
			'titulo' => 'Nota del escritor J. D. Salinger se subasta por 50 mil d&oacute;lares',
			'ctime' => '2010-05-30',
			'texto' => '<p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo <em>Contenido aqu&iacute;, contenido aqu&iacute;</em>. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer.<br><br>Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto.</p><p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo <em>Contenido aqu&iacute;, contenido aqu&iacute;</em>. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer.<br><br>Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto.</p>',
			'imagen' => 'noticia01.jpg'
		)
	),
	2011 => array(
		7 => array(
			'id_noticia' => 7,
			'titulo' => 'El libro que revoluciona Argentina llega a Colombia',
			'ctime' => '2010-03-30',
			'texto' => '<p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo <em>Contenido aqu&iacute;, contenido aqu&iacute;</em>. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer.<br><br>Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto.</p><p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo <em>Contenido aqu&iacute;, contenido aqu&iacute;</em>. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer.<br><br>Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto.</p>',
			'imagen' => 'noticia01.jpg'
		),
		8 => array(
			'id_noticia' => 8,
			'titulo' => 'Llegan los cuentos para todo p&uacute;blico',
			'ctime' => '2010-04-30',
			'texto' => '<p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo <em>Contenido aqu&iacute;, contenido aqu&iacute;</em>. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer.<br><br>Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto.</p><p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo <em>Contenido aqu&iacute;, contenido aqu&iacute;</em>. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer.<br><br>Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto.</p>',
			'imagen' => 'noticia01.jpg'
		),
		9 => array(
			'id_noticia' => 9,
			'titulo' => 'Expectativa por la salida del nuevo libro de Juan Estevez, El Ganador',
			'ctime' => '2010-05-30',
			'texto' => '<p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo <em>Contenido aqu&iacute;, contenido aqu&iacute;</em>. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer.<br><br>Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto.</p><p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo <em>Contenido aqu&iacute;, contenido aqu&iacute;</em>. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer.<br><br>Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto.</p>',
			'imagen' => 'noticia01.jpg'
		),
		10 => array(
			'id_noticia' => 11,
			'titulo' => 'Nombran a una calle de San Telmo en homenaje a escritor',
			'ctime' => '2010-03-30',
			'texto' => '<p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo <em>Contenido aqu&iacute;, contenido aqu&iacute;</em>. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer.<br><br>Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto.</p><p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo <em>Contenido aqu&iacute;, contenido aqu&iacute;</em>. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer.<br><br>Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto.</p>',
			'imagen' => 'noticia01.jpg'
		),
		12 => array(
			'id_noticia' => 12,
			'titulo' => 'Taller de Letras: Literatura para mujeres actuales',
			'ctime' => '2010-04-30',
			'texto' => '<p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo <em>Contenido aqu&iacute;, contenido aqu&iacute;</em>. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer.<br><br>Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto.</p><p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo <em>Contenido aqu&iacute;, contenido aqu&iacute;</em>. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer.<br><br>Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto.</p>',
			'imagen' => 'noticia01.jpg'
		),
		13 => array(
			'id_noticia' => 13,
			'titulo' => 'Cuando el f&uacute;tbol se encuentra con la literatura',
			'ctime' => '2010-05-30',
			'texto' => '<p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo <em>Contenido aqu&iacute;, contenido aqu&iacute;</em>. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer.<br><br>Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto.</p><p>Es un hecho establecido hace demasiado tiempo que un lector se distraer&aacute; con el contenido del texto de un sitio mientras que mira su dise&ntilde;o. El punto de usar Lorem Ipsum es que tiene una distribuci&oacute;n m&aacute;s o menos normal de las letras, al contrario de usar textos como por ejemplo <em>Contenido aqu&iacute;, contenido aqu&iacute;</em>. Estos textos hacen parecerlo un espa&ntilde;ol que se puede leer.<br><br>Muchos paquetes de autoedici&oacute;n y editores de p&aacute;ginas web usan el Lorem Ipsum como su texto por defecto.</p>',
			'imagen' => 'noticia01.jpg'
		)
	),
);




?>