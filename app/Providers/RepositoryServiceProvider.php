<?php

namespace App\Providers;

use App\Contracts\ApiKeyRepositoryInterface;
use App\Contracts\InstanceRepositoryInterface;
use App\Contracts\InstitutionRepositoryInterface;
use App\Contracts\LicenseRepositoryInterface;
use App\Contracts\LinksPackageRepositoryInterface;
use App\Contracts\MedicalIndicationRepositoryInterface;
use App\Contracts\MemberRepositoryInterface;
use App\Contracts\RoleRepositoryInterface;
use App\Contracts\SeriesRepositoryInterface;
use App\Contracts\ServiceRepositoryInterface;
use App\Contracts\SignatureRepositoryInterface;
use App\Contracts\StoragePackageRepositoryInterface;
use App\Contracts\StudyAudioRepositoryInterface;
use App\Contracts\StudyLinkRepositoryInterface;
use App\Contracts\StudyPermissionRepositoryInterface;
use App\Contracts\StudyReportRepositoryInterface;
use App\Contracts\StudyRepositoryInterface;
use App\Contracts\TemplateRepositoryInterface;
use App\Contracts\UserLinkPackageRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Contracts\UserServiceRepositoryInterface;
use App\Contracts\UserStoragePackageRepositoryInterface;
use App\Contracts\WorkRepositoryInterface;
use App\Repositories\ApiKeyRepository;
use App\Repositories\InstanceRepository;
use App\Repositories\InstitutionRepository;
use App\Repositories\LicenseRepository;
use App\Repositories\LinksPackageRepository;
use App\Repositories\MedicalIndicationRepository;
use App\Repositories\MemberRepository;
use App\Repositories\RoleRepository;
use App\Repositories\SerieRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\SignatureRepository;
use App\Repositories\StoragePackageRepository;
use App\Repositories\StudyAudioRepository;
use App\Repositories\StudyLinkRepository;
use App\Repositories\StudyPermissionRepository;
use App\Repositories\StudyReportRepository;
use App\Repositories\StudyRepository;
use App\Repositories\TemplateRepository;
use App\Repositories\UserLinkPackageRepository;
use App\Repositories\UserRepository;
use App\Repositories\UserServiceRepository;
use App\Repositories\UserStoragePackageRepository;
use App\Repositories\WorkRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $bindings = [
            UserRepositoryInterface::class => UserRepository::class,

        ];

        foreach ($bindings as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //

    }
}
