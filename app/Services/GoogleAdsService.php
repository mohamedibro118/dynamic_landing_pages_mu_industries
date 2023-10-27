<?php
namespace App\Services;

use Google\Ads\GoogleAds\Lib\V14\GoogleAdsClient;
use Google\Ads\GoogleAds\Lib\V14\GoogleAdsClientBuilder;
use Google\Ads\GoogleAds\Lib\OAuth2TokenBuilder;

class GoogleAdsService
{
    public function getClient()
    {
        $oAuth2Credential = (new OAuth2TokenBuilder())
            ->withClientId(config('googleads.client_id'))
            ->withClientSecret(config('googleads.client_secret'))
            ->withRefreshToken(config('googleads.refresh_token'))
            ->build();

        return (new GoogleAdsClientBuilder())
            ->withDeveloperToken(config('googleads.developer_token'))
            ->withOAuth2Credential($oAuth2Credential)
            ->build();
    }

    public function getCampaigns()
    {
        $googleAdsClient = $this->getClient();
        
        $googleAdsServiceClient = $googleAdsClient->getGoogleAdsServiceClient();
        $customerId ='9124579413'; // Replace with your Google Ads customer ID
        $query = 'SELECT campaign.id, campaign.name FROM campaign ORDER BY campaign.id';

        $stream = $googleAdsServiceClient->searchStream($customerId, $query);
        dd($stream);
        $results = [];
        
        foreach ($stream->iterateAllElements() as $googleAdsRow) {
            $results[] = [
                'id' => $googleAdsRow->getCampaign()->getId(),
                'name' => $googleAdsRow->getCampaign()->getName(),
            ];
        }

        return $results;
    }
}
