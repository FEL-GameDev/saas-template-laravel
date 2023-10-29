import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link, useForm } from "@inertiajs/react";
import { PageProps, User } from "@/types";
import PageContainer from "@/Components/PageContainer";
import Card from "@/Components/Card";
import PrimaryButton from "@/Components/PrimaryButton";
import GuestLayout from "@/Layouts/GuestLayout";
import { FormEventHandler } from "react";
import TextInput from "@/Components/Forms/TextInput";
import InputLabel from "@/Components/Forms/InputLabel";

export interface InvitedUsersIndexProps extends PageProps {
    name: string;
    inviteCode: string;
    email: string;
    organization: string;
}

export default function InvitedUsersIndex({
    inviteCode,
    name,
    email,
    organization,
}: InvitedUsersIndexProps) {
    const { data, setData, patch, errors, processing, recentlySuccessful } =
        useForm({
            name,
            password: "",
            email,
        });

    const submit: FormEventHandler = (e) => {
        e.preventDefault();

        patch(route("register.acceptInvite"));
    };

    return (
        <GuestLayout>
            <Head title="Register" />

            <PageContainer>
                <Card
                    heading={`Hi, ${name}, welcome to ${organization}`}
                    className="max-w-xl"
                >
                    <p>Let's get you set up</p>

                    <form onSubmit={submit} className="mt-6 space-y-6">
                        <div>
                            <InputLabel htmlFor="name" value="Name" />

                            <TextInput
                                id="name"
                                className="mt-1 block w-full"
                                value={data.name}
                                onChange={(e) =>
                                    setData("name", e.target.value)
                                }
                                required
                                autoComplete="name"
                            />
                        </div>

                        <div>
                            <InputLabel htmlFor="password" value="Password" />

                            <TextInput
                                id="password"
                                className="mt-1 block w-full"
                                value={data.password}
                                onChange={(e) =>
                                    setData("password", e.target.value)
                                }
                                required
                                isFocused
                                autoComplete="password"
                            />
                        </div>

                        <TextInput
                            id="email"
                            value={email}
                            hidden={true}
                            readOnly
                        />

                        <TextInput
                            readOnly
                            id="inviteCode"
                            value={inviteCode}
                            hidden={true}
                        />
                    </form>
                </Card>
            </PageContainer>
        </GuestLayout>
    );
}
