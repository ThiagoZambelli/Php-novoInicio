<?php

declare(strict_types=1);

namespace Aula11\Mvc\Repository;

use Aula11\Mvc\Model\Video;
use PDO;

class VideoRepository
{
    public function __construct(private PDO $pdo)
    {

    }

    public function add(Video $video): bool
    {

        $sql = 'INSERT INTO videos (url, title) VALUES (?,?)';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $video->url);
        $statement->bindValue(2, $video->title);

        $resultado = $statement->execute();
        $id = (int) $this->pdo->lastInsertId();

        $video->setId($id);
        return $resultado;
    }

    public function remove(int $id): bool
    {
        $sql = 'DELETE FROM videos WHERE id = ?;';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        return $statement->execute();
    }

    public function update(Video $video): bool
    {
        $sql = 'UPDATE videos SET url=:url, title=:title WHERE id = :id;';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':url', $video->url);
        $statement->bindValue(':title', $video->title);
        $statement->bindValue(':id', $video->id);

        return $statement->execute();
    }

    /**
     * Summary of all
     * @return Video[]
     */
    public function all(): array
    {
        $videoList = $this->pdo
            ->query('SELECT * FROM videos;')
            ->fetchAll(PDO::FETCH_ASSOC);

        return array_map(function (array $videoData) {
            $video = new Video(url: $videoData['url'], title: $videoData['title']);
            $video->setId($videoData['id']);
            return $video;
        }, $videoList);

    }

}