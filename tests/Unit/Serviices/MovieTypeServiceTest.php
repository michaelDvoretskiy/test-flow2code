<?php

namespace Tests\Unit\Serviices;

use App\Interfaces\MovieTypeRepositoryInterface;
use App\ModelMappers\MovieTypeMapper;
use App\Models\Movie;
use App\Models\MovieType;
use App\Services\MovieTypeService;
use Illuminate\Support\Collection;
use Mockery\Mock;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class MovieTypeServiceTest extends TestCase
{
    private MovieTypeMapper|MockObject $mockMovieTypeMapper;
    private MovieTypeRepositoryInterface|MockObject $mockTypeRepository;
    private MovieTypeService $movieTypeService;
    protected function setUp(): void
    {
        parent::setUp();

        $this->movieTypeService = new MovieTypeService(
            $this->mockMovieTypeMapper = $this->createMock(
                MovieTypeMapper::class
            ),
            $this->mockTypeRepository = $this->createMock(
                MovieTypeRepositoryInterface::class
            )
        );
    }
    /**
     * A basic unit test example.
     */
    public function test_get_movie_types(): void
    {
        $dataMapperTestRes = ['id'=>1, 'name'=>'Comedy'];

        $this->mockTypeRepository->expects(self::once())
            ->method('getAll')
            ->willReturn(new Collection([
                new MovieType()
            ]));

        $this->mockMovieTypeMapper->expects(self::once())
            ->method('__invoke')
            ->willReturn($dataMapperTestRes);

        $data = $this->movieTypeService->getMovieTypes();

        $this->assertEquals([$dataMapperTestRes], $data->toArray());
    }
}
