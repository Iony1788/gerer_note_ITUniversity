<center>
    <p>N° d'inscription: {{ $releveDeNotesAnne[0]->first()->num_etu }}</p>
</center>

@foreach ($releveDeNotesAnne as $releveDeNotes)
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>EU</th>
                    <th>Intitulé</th>
                    <th>Crédits</th>
                    <th>Note/20</th>
                    <th>Résultat</th>
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

    <p>Moyenne: {{ round($releveDeNotes->first()->moyenne_etudiant, 2) }}</p>
@endforeach

@php
    // Convert array to collection
    $releveDeNotesCollection = collect($releveDeNotesAnne);

    // Calculate the average of each semester
    $totalMoyennes = $releveDeNotesCollection->map(function($releveDeNotes) {
        return collect($releveDeNotes)->avg('moyenne_etudiant');
    });

    // Calculate the overall average
    $average = round($totalMoyennes->sum() / $totalMoyennes->count(), 2);
@endphp

<p @if($average < 10) style="background-color:red;" @endif>
    Moyenne générale : {{ $average }}
</p>
