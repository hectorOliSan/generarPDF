# A4.1 - Creación de objetos para generar documentos PDF

Existen diferentes librerías PHP que nos permiten crear documentos PDF e incorporarles contenido en diversos formatos. Vamos a implementar dos clases que nos faciliten la generación de documentos PDF simples utilizando para ello las dos librerías que deseemos. Vamos a crear la siguiente jerarquía de clases:

- MiPDF
  - Será una clase abstracta.
  - En esta clase se implementarán los getter y los setters correspondientes.
  - Tendrá dos constructores con diferente número de parámetros.
  - Atributos: “Titulo”, “Contenido”, “Tipo de letra”, “Tamaño”, “Alineación”.
  - Métodos:
    - generaDoc -> Generará un fichero PDF con la información registrada en los atributos del objeto.
    - almacenaDoc -> Guarda el documento PDF en disco.
    - devuelveDoc -> Envía el fichero PDF generado al navegador.
- MiFPDF (Su nombre dependerá de la librería usada)
  - Será una subclase de la clase MiPDF
- MiPDFLib (Su nombre dependerá de la librería usada)
  - Será una subclase de la clase MiPDF

Alguna de las clases deberá tener una constante de la cuál deberás hacer uso.

Establece los modificadores de acceso que consideres.

Intenta buscar utilidad a la creación de una interfaz que pueda implementar alguna de las clases.

Eres libre de añadir atributos/métodos y definir los parámetros que consideres en la definición de las clases.
