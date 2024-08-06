<style>
    /* public/css/custom.css */

h1 {
    font-size: 2.5em;
    color: #3692c6; 
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


<h1>Relevé de notes</h1>
<center> OPTION DEVELOPPEMENT </p> </center>
<center> <p>N° d'inscription:{{ $releveDeNotes->first()->num_etu }} </p> </center>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>EU</th>
                        <th>Intitulé</th>
                        <th>Crédits</th>
                        <th>Note/20</th>
                        <th>Resulat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($releveDeNotes as $releveDeNote)
                        <tr>
                            <td>{{ $releveDeNote->code_matiere }}</td>
                            <td>{{ $releveDeNote->nom_matiere }}</td>
                            <td>{{ $releveDeNote->credit_obtenu }}</td>
                            <td>{{ $releveDeNote->note }}</td>
                            <td>{{ $releveDeNote->classification }}</td>
                        </tr>
                    @endforeach
                </tbody>
               
            </table>
        </div>
        <p>Moyenne: {{round($releveDeNotes->first()->moyenne_etudiant,2)}}</p>
        <p>Total credit obtenu: {{$releveDeNotes->first()->somme_credit}}</p>