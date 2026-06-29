<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\EditProfile as BaseEditProfile;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Group;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Actions\Action;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Text;

class EditProfile extends BaseEditProfile
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([

                Group::make([

                    Section::make('Foto Profil')
                        ->description('Unggah foto profil Anda.')
                        ->icon('heroicon-o-photo')
                        ->schema([

                            FileUpload::make('profile.avatar')
                                ->label('Foto Profil')
                                ->avatar()
                                ->image()
                                ->disk('public')
                                ->directory('avatars')
                                ->imageEditor()
                                ->imageEditorAspectRatios(['1:1'])
                                ->maxSize(2048),

                        ]),

                    Section::make('Informasi Akun')
                        ->description('Kelola informasi pribadi akun Anda.')
                        ->icon('heroicon-o-user-circle')
                        ->columns(2)
                        ->schema([

                            $this->getNameFormComponent(),

                            $this->getEmailFormComponent(),

                            TextInput::make('profile.phone')
                                ->label('Nomor HP')
                                ->tel()
                                ->placeholder('08xxxxxxxxxx')
                                ->maxLength(20),

                            TextInput::make('profile.position')
                                ->label('Jabatan')
                                ->placeholder('Contoh: Administrator'),

                            Select::make('profile.gender')
                                ->label('Jenis Kelamin')
                                ->options([
                                    'Laki-laki' => 'Laki-laki',
                                    'Perempuan' => 'Perempuan',
                                ])
                                ->native(false)
                                ->placeholder('Pilih jenis kelamin'),

                            DatePicker::make('profile.birth_date')
                                ->label('Tanggal Lahir')
                                ->native(false),

                            Textarea::make('profile.address')
                                ->label('Alamat')
                                ->placeholder('Masukkan alamat lengkap...'),

                            Textarea::make('profile.bio')
                                ->label('Bio')
                                ->placeholder('Tuliskan deskripsi singkat mengenai diri Anda...')

                        ]),

                    Section::make('Keamanan')
                        ->description('Perbarui password akun Anda.')
                        ->icon('heroicon-o-shield-check')
                        ->columns(2)
                        ->schema([

                            $this->getPasswordFormComponent(),

                            $this->getPasswordConfirmationFormComponent(),

                            $this->getCurrentPasswordFormComponent(),

                        ]),

                ])
                    ->extraAttributes([
                        'class' => 'space-y-8 mt-8',
                    ]),

            ]);
    }


    protected function getHeaderAttributes(): array
    {
        return [
            'class' => 'pt-8',
        ];
    }

    public static function isSimple(): bool
    {
        return false;
    }

    public function getHeaderSchema(): array
    {
        return [
            Section::make()
                ->schema([
                    Text::make('title')
                        ->content('Profil Saya')
                        ->size(Text::Size::Large)
                        ->weight('bold'),

                    Text::make('subtitle')
                        ->content('Kelola informasi akun, foto profil, dan keamanan akun Anda.')
                        ->color('gray'),
                ])
                ->extraAttributes([
                    'class' => 'mb-10',
                ])
                ->compact(),
        ];
    }

    protected function getSaveFormAction(): Action
    {
        return Action::make('save')
            ->label('Perbarui Profil')
            ->icon('heroicon-o-arrow-path')
            ->color('success')
            ->size('lg')
            ->submit('save')
            ->keyBindings(['mod+s']);
    }
}