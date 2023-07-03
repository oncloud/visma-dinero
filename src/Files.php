<?php

namespace OnCloud\Dinero;

use OnCloud\Dinero\Facades\Dinero;

class Files
{
    /**
     * Download the specified file. Returns the file with a certain file guid.
     *
     * @param string $fileGuid
     * @return mixed
     */
    public function get(string $fileGuid)
    {
        return Dinero::client()
            ->get('/files/'.$fileGuid)
            ->json();
    }

    /**
     * List files. Lists all files in file archive.
     *
     * @param array $extensions
     * @param string|null $uploadedBefore
     * @param string|null $uploadedAfter
     * @param int|null $fileStatus
     * @param int|null $page
     * @param int|null $pageSize
     * @return mixed
     */
    public function list(array $extensions = [], string $uploadedBefore = null, string $uploadedAfter = null, int $fileStatus = null, int $page = null, int $pageSize = null)
    {
        return Dinero::client()
            ->withQueryParameters([
                'extensions' => $extensions,
                'uploadedBefore' => $uploadedBefore,
                'uploadedAfter' => $uploadedAfter,
                'fileStatus' => $fileStatus,
                'page' => $page,
                'pageSize' => $pageSize,
            ])
            ->get('/files')
            ->json();
    }

}
