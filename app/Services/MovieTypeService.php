<?php

namespace App\Services;

use App\Interfaces\MovieTypeRepositoryInterface;
use App\Interfaces\MovieTypeServiceInretface;
use App\ModelMappers\MovieTypeMapper;
use Illuminate\Support\Collection;

class MovieTypeService implements MovieTypeServiceInretface
{
    public function __construct(
        private MovieTypeMapper $movieTypeMapper,
        private MovieTypeRepositoryInterface $movieTypeRepository
    )
    {
    }

    public function getMovieTypes(): Collection
    {
        $movieTypes = $this->movieTypeRepository->getAll();
        return $movieTypes->map(
            $this->movieTypeMapper
        );
    }
}
