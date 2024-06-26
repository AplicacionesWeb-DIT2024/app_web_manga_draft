## Descripción del Proyecto

El proyecto a desarrollar en la materia será una aplicación de venta de mangas especializada para entusiastas del manga. Cuando nos referimos a "mangas", hablamos de cómics japoneses que abarcan una amplia variedad de géneros, desde acción y aventura hasta romance y ciencia ficción. Esta aplicación llevará por nombre "MangaDraft" y contará con dos partes, una en el backend y otra en el frontend.

### Backend

El backend será desarrollado en Laravel adicionalmente se hara uso de craftable para la genracion de curds y usuarios el backend permitirá a los administradores llevar a cabo las siguientes acciones:

#### Gestión de mangas

- Los administradores podrán agregar, modificar o eliminar mangas existentes.
- Estos mangas tendrán como atributos:
  - Código (clave primaria)
  - Título
  - Cantidad en stock
  - Autor (clave foránea)
  - Editorial a la que pertenece (clave foránea)
  - Volumen
  - Año de publicación
  - Precio
  - Categoría (clave foránea)

#### Gestión de editoriales

- Los administradores podrán agregar, modificar o eliminar editoriales.
- Estas editoriales tendrán como atributos:
  - Código
  - Nombre

#### Gestión de autores

- Los administradores podrán agregar, modificar o eliminar autores.
- Los autores tendrán como atributos:
  - Código (clave primaria)
  - Nombre
  - Año de nacimiento

#### Gestión de categorías

- Los administradores podrán agregar, modificar o eliminar categorías.
- Estas categorías tendrán como atributos:
  - Código
  - Nombre
  - Demografía a la que están dirigidas (como un enumerado que indica el público objetivo del manga, por ejemplo: Shonen, Shojo, Seinen, Josei, Kodomo)

#### Gestión de usuarios

- Los usuarios tendrán como atributos:
  - Nombre de usuario
  - Contraseña
  - Tipo (superadmin, administrador de mangas y clientes)

### Frontend

El frontend estará orientado a los clientes y será desarrollado en React. Los clientes podrán realizar las siguientes acciones:

#### Gestión de compras

- Los clientes podrán solicitar mangas o modificar la cantidad de mangas solicitados.
- Los clientes no registrados podrán ver los mangas pero no podrán comprarlos. Para comprarlos, deberán registrarse e iniciar sesión.
- Los clientes podrán calificar el manga comprado e indicar alguna reseña sobre el mismo.
- Los clientes podrán filtrar los mangas según el título, año de publicación, editorial, autor y demografía.

#### Gestión de pagos

- Los clientes podrán especificar el medio de pago para el manga, ya sea efectivo, débito o crédito. En caso de ser en crédito, indicarán el número de cuotas.

#### Gestión de pedidos

- Los pedidos requerirán el domicilio del cliente, la empresa de correo que transportará el pedido y la fecha estimada de entrega. Además, se les otorgará un número de seguimiento para rastrear el pedido.

Alumno:
Irigoyen Carlos Damian
