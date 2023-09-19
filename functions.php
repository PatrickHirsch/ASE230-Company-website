<?php
function readUserData()
{
    
    $file = file_get_contents('starluxe.json');
    $file = json_decode($file);
    return $file;
}

function fillTeam($JSONData)
{
    $counter = 0;
    foreach($JSONData['Team'] as $team) {
        $teamMember = $JSONData['Team'][array_keys($JSONData['Team'])[$counter]];

        // Extract team member information from JSON
        $name = $teamMember['title'];
        $position = $teamMember['description'];
        $imageSrc = $teamMember['image'];

        // Echo the HTML template with the extracted information
        echo '
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
                    <div class="position-relative overflow-hidden">
                        <img src="' . $imageSrc . '" alt="" class="img-fluid d-block mx-auto" />
                        <ul class="list-inline p-3 mb-0 team-social-item">
                            <li class="list-inline-item mx-3">
                                <a href="javascript: void(0);" class="team-social-icon h-primary"><i class="icon-sm" data-feather="facebook"></i></a>
                            </li>
                            <li class="list-inline-item mx-3">
                                <a href="javascript: void(0);" class="team-social-icon h-info"><i class="icon-sm" data-feather="twitter"></i></a>
                            </li>
                            <li class="list-inline-item mx-3">
                                <a href="javascript: void(0);" class="team-social-icon h-danger"><i class="icon-sm" data-feather="instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="p-4">
                        <h5 class="font-size-19 mb-1">' . $name . '</h5>
                        <p class="text-muted text-uppercase font-size-14 mb-0">' . $position . '</p>
                    </div>
                </div>
            </div>
        </div>';

        $counter++;
    }
}
?>