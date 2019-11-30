<?php


class MissingFiles
{
    private $repo;
    private $pathToFolder;
    private $startDate;
    private $endDate;
    private $recordsPerPage = 1;

    /**
     * MissingFiles constructor.
     * @param ImagesRepository $repo
     * @param string $pathToFolder
     * @param string $startDate
     * @param string $endDate
     * @param int $recordsPerPage
     */
    public function __construct(ImagesRepository $repo, string $pathToFolder, string $startDate, string $endDate, int $recordsPerPage) {
        $this->repo = $repo;
        $this->pathToFolder = $pathToFolder;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->recordsPerPage = $recordsPerPage;
    }

    /**
     * @return array
     */
    public function getFiles():array {
        $page = 0;
        $files = [];

        // collect records and process
        while ($data = $this->repo->getForInterval($this->startDate, $this->endDate, $page, $this->recordsPerPage)) {

            foreach($data as $item) {
                $path = FOLDER . DS . $item['name'];

                if (!is_file($path)) {
                    $files[] = $path; // memory
                }
            }

            $page += 1;
        }

        return $files;
    }

    /**
     * @param array $data
     */
    public function printResult(array $data):void {
        printf("Total missing files: %d (from %s to %s)\n", count($data), $this->startDate, $this->endDate);

        foreach ($data as $file) {
            printf("   missing file: %s\n", $file);
        }
    }
}