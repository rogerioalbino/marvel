<?php
/**
 * Created by PhpStorm.
 * User: roger
 * Date: 20/03/2018
 * Time: 12:10
 */

namespace App\Http\Controllers;

use App\Services\CharacterService;
use Request;


class CharacterController extends Controller
{

    private $characterService = null;

    public function __construct()
    {
        $this->characterService = new CharacterService();
    }

    public function index()
    {
        $dataCharacter = $this->characterService->findAll();
        return view('characters/index', $dataCharacter);
    }

    public function findById(int $id)
    {
        $dataCharacter = $this->characterService->findById($id);
        return view('characters/character', $dataCharacter);
    }

    public function findByName()
    {
        $name = Request::input('name');

        if (!empty($name)) {
            $dataCharacter = $this->characterService->findByName($name);

            if ($dataCharacter == null) {
                $dataCharacter = $this->characterService->findAll();
                $erroForm = ['erroForm' => 'Personagem não encontrado.'];

                return view('characters/index', $erroForm, $dataCharacter);

            }

            return view('characters/character', $dataCharacter);

        }

    }

}
