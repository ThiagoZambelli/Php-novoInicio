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
        $sql = 'INSERT INTO videos (url, title) VALUES (?, ?)';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $video->url);
        $statement->bindValue(2, $video->title);

        $resultado = $statement->execute();

        if ($resultado) {
            $video->setId((int) $this->pdo->lastInsertId());
        }

        return $resultado;
    }

    public function remove(int $id): bool
    {
        $sql = 'DELETE FROM videos WHERE id = ?';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id, PDO::PARAM_INT);

        return $statement->execute();
    }

    public function update(Video $video): bool
    {
        $sql = 'UPDATE videos
                SET url = :url, title = :title
                WHERE id = :id';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':url', $video->url);
        $statement->bindValue(':title', $video->title);
        $statement->bindValue(':id', $video->id, PDO::PARAM_INT);

        return $statement->execute();
    }

    /**
     * @return Video[]
     */
    public function all(): array
    {
        $videoList = $this->pdo
            ->query('SELECT * FROM videos')
            ->fetchAll(PDO::FETCH_ASSOC);

        return array_map(
            fn (array $videoData): Video => $this->hydrateVideo($videoData),
            $videoList
        );
    }

    public function find(int $id): ?Video
    {
        $sql = 'SELECT * FROM videos WHERE id = ?';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id, PDO::PARAM_INT);
        $statement->execute();

        $videoData = $statement->fetch(PDO::FETCH_ASSOC);

        if ($videoData === false) {
            return null;
        }

        return $this->hydrateVideo($videoData);
    }

    private function hydrateVideo(array $videoData): Video
    {
        $video = new Video(
            url: $videoData['url'],
            title: $videoData['title']
        );

        $video->setId((int) $videoData['id']);

        return $video;
    }
}