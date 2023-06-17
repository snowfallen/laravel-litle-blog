<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Solarium\Client;
use Solarium\Core\Query\Result\ResultInterface;
use Solarium\QueryType\Update\Result;

class SolariumController extends Controller
{
    protected Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return JsonResponse
     */
    public function ping(): JsonResponse
    {
        $ping = $this->client->createPing();

        try {
            $this->client->ping($ping);
            return response()->json('OK');
        } catch (Exception $e) {
            return response()->json('ERROR', 500);
        }
    }

    /**
     * @param Post $post
     * @return ResultInterface|Result
     */
    public function indexingPost(Post $post): Result|ResultInterface
    {
        $update = $this->createPostDocument($post, $this->client->createUpdate());

        return $this->createSolrCommit($update);
    }

    /**
     * @param Post $post
     * @return ResultInterface|Result
     */
    public function deleteById(Post $post): Result|ResultInterface
    {
        $update = $this->client->createUpdate();
        $update->addDeleteQuery('id:' . $post->id);

        return $this->createSolrCommit($update);
    }

    /**
     * @return RedirectResponse
     */
    public function reindex(): RedirectResponse
    {
        $this->delete();
        foreach (Post::all() as $post) {
            $this->indexingPost($post);
        }

        return back()->with('success', 'Data has been reindex successfully');
    }

    public function search() {
        $query = $this->client->createSelect();
        $inputValue = 'Alice';
        $query->setQuery('post_content:' . $inputValue);
        $query->setRows(100);
        $searchDocuments = $this->createSolrResultSet($query);

        dd($searchDocuments);
        $documentsId = [];

        foreach ($searchDocuments as $docId) {
            $documentsId[] = $docId['id'];
        }
        dd($documentsId);
    }

    /**
     * @param $post
     * @param $update
     * @return mixed
     */
    private function createPostDocument($post, $update): mixed
    {
        $documentPost = $update->createDocument();
        $documentPost->id = $post->id;
        $documentPost->post_content = $post->content;

        return $update->addDocument($documentPost);
    }

    /**
     * @return Result|ResultInterface
     */
    private function delete(): Result|ResultInterface
    {
        $update = $this->client->createUpdate();
        $update->addDeleteQuery('id:' . '*');

        return $this->createSolrCommit($update);
    }

    /**
     * @param $update
     * @return ResultInterface|Result
     */
    private function createSolrCommit($update): Result|ResultInterface
    {
        $update->addCommit();

        return $this->client->update($update);
    }

    /**
     * @param $query
     * @return array
     */
    private function createSolrResultSet($query): array
    {
        $resultSet = $this->client->select($query);

        return $resultSet->getDocuments();
    }
}
