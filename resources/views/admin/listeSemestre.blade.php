<style>
    /* public/css/custom.css */

/* public/css/custom.css */

h1 {
    font-size: 2.5em;
    color: #3692c6; /* Couleur verte */
    text-align: center;
    margin-bottom: 20px;
}

.table {
    margin-top: 20px;
    width: 100%;
    max-width: 100%;
    border-collapse: collapse;
}

.table th, .table td {
    text-align: center;
    vertical-align: middle;
    padding: 10px;
    border: 1px solid #dee2e6;
}

.table th {
    background-color: #343a40;
    color: #fff;
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(0, 0, 0, 0.05);
}

.table-bordered {
    border: 1px solid #dee2e6;
}

.table a {
    font-weight: bold;
    color: #17a2b8;
}

.table a:hover {
    text-decoration: underline;
    color: #138496;
}

/* Ajouter des styles supplémentaires pour améliorer l'apparence */
.table-responsive {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

.table-hover tbody tr:hover {
    background-color: rgba(0, 0, 0, 0.075);
}

</style>
<h1>Liste des semestres</h1>
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Semestre</th>
                <th>Moyenne</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($semestres as $semestre)
                <tr>
                    <td>{{ $semestre->id }}</td>
                    <td>
                        <a href="{{ route('releveDeNote', ['id' => $id, 'semestre' => $semestre->id]) }}" class="btn btn-info btn-block">
                            {{ $semestre->nom }}
                        </a>
                    </td>
                    <td>{{round($semestre['moyenne'],2)}}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>