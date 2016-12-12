<?php

/**
 * LICENSE: The MIT License (the "License")
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * https://github.com/azure/azure-storage-php/LICENSE
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * PHP version 5
 *
 * @category  Microsoft
 * @package   MicrosoftAzure\Storage\Blob\Models
 * @author    Azure Storage PHP SDK <dmsh@microsoft.com>
 * @copyright 2016 Microsoft Corporation
 * @license   https://github.com/azure/azure-storage-php/LICENSE
 * @link      https://github.com/azure/azure-storage-php
 */
 
namespace MicrosoftAzure\Storage\Blob\Models;

use MicrosoftAzure\Storage\Common\Internal\Resources;
use MicrosoftAzure\Storage\Common\Internal\Utilities;

/**
 * The result of calling copyBlob API.
 *
 * @category  Microsoft
 * @package   MicrosoftAzure\Storage\Blob\Models
 * @author    Azure Storage PHP SDK <dmsh@microsoft.com>
 * @copyright 2016 Microsoft Corporation
 * @license   https://github.com/azure/azure-storage-php/LICENSE
 * @version   Release: 0.11.0
 * @link      https://github.com/azure/azure-storage-php
 */
class CopyBlobResult
{
    /**
     * @var string
     */
    private $_etag;
    
    /**
     * @var \DateTime
     */
    private $_lastModified;
    
    /**
     * Creates CopyBlobResult object from the response of the copy blob request.
     *
     * @param array $headers The HTTP response headers in array representation.
     *
     * @return CopyBlobResult
     */
    public static function create($headers)
    {
        $result = new CopyBlobResult();
        $result->setETag(
            Utilities::tryGetValueInsensitive(
                Resources::ETAG,
                $headers
            )
        );
        if (Utilities::arrayKeyExistsInsensitive(Resources::LAST_MODIFIED, $headers)) {
            $lastModified = Utilities::tryGetValueInsensitive(
                Resources::LAST_MODIFIED,
                $headers
            );
            $result->setLastModified(Utilities::rfc1123ToDateTime($lastModified));
        }
        
        return $result;
    }
    
    /**
     * Gets ETag.
     *
     * @return string
     */
    public function getETag()
    {
        return $this->_etag;
    }

    /**
     * Sets ETag.
     *
     * @param string $etag value.
     *
     * @return void
     */
    public function setETag($etag)
    {
        $this->_etag = $etag;
    }
    
    /**
     * Gets blob lastModified.
     *
     * @return \DateTime
     */
    public function getLastModified()
    {
        return $this->_lastModified;
    }

    /**
     * Sets blob lastModified.
     *
     * @param \DateTime $lastModified value.
     *
     * @return void
     */
    public function setLastModified(\DateTime $lastModified)
    {
        $this->_lastModified = $lastModified;
    }
}
