<?php

namespace App\Repositories\Interface;

interface TagLanguageInterface
{
    public function all();

    public function paginate($limit);

    public function get($id);

    public function getByLang($id, $request);

    public function store($request);

    public function update($request);


}



