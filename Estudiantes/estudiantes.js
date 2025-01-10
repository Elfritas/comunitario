document.addEventListener("DOMContentLoaded", () => {
    const apiUrl = "estudiantes.php";
    const tabla = document.getElementById("tablaEstudiantes").querySelector("tbody");
    const modal = document.getElementById("modal");
    const form = document.getElementById("formEstudiante");

    const cargarEstudiantes = async () => {
        const response = await fetch(apiUrl);
        const estudiantes = await response.json();
        tabla.innerHTML = estudiantes
            .map(e => `
                <tr>
                    <td>${e.id}</td>
                    <td>${e.nombre}</td>
                    <td>${e.apellido}</td>
                    <td>${e.ano}</td>
                    <td>${e.curso}</td>
                    <td>${e.tiene_materias_aplazadas ? 'Sí' : 'No'}</td>
                    <td>${e.talento || '-'}</td>
                    <td>${e.representante_documento ? 'Sí' : 'No'}</td>
                    <td>
                        <button onclick="editar(${e.id})">Editar</button>
                        <button onclick="eliminar(${e.id})">Eliminar</button>
                    </td>
                </tr>
            `)
            .join("");
    };

    const guardarEstudiante = async (e) => {
        e.preventDefault();
        const data = new FormData(form);
        const json = Object.fromEntries(data.entries());
        const method = json.id ? "PUT" : "POST";
        const response = await fetch(apiUrl, {
            method,
            body: JSON.stringify(json),
            headers: { "Content-Type": "application/json" }
        });
        await response.json();
        modal.style.display = "none";
        cargarEstudiantes();
    };

    const eliminar = async (id) => {
        await fetch(`${apiUrl}?id=${id}`, { method: "DELETE" });
        cargarEstudiantes();
    };

    cargarEstudiantes();
    form.addEventListener("submit", guardarEstudiante);
});
