import {Head, useForm} from "@inertiajs/react";
import {PageProps} from "@/types";
import PageContainer from "@/Components/PageContainer";
import Card from "@/Components/Card";
import PrimaryButton from "@/Components/PrimaryButton";
import GuestLayout from "@/Layouts/GuestLayout";
import {FormEventHandler} from "react";
import TextInput from "@/Components/Forms/TextInput";
import InputLabel from "@/Components/Forms/InputLabel";
import InputError from "@/Components/Forms/InputError";

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
    const { data, setData, post, errors, processing } =
        useForm({
            name,
            password: "",
            email,
            inviteCode,
        });

    const submit: FormEventHandler = (e) => {
        e.preventDefault();

        post(route("register.acceptInvite"));
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
                                name="name"
                                className="mt-1 block w-full"
                                value={data.name}
                                onChange={(e) =>
                                    setData("name", e.target.value)
                                }
                                required
                                autoComplete="name"
                            />

                            <InputError
                                message={errors.name}
                                className="mt-2"
                            />
                        </div>

                        <div>
                            <InputLabel htmlFor="password" value="Password" />

                            <TextInput
                                id="password"
                                name="password"
                                className="mt-1 block w-full"
                                type="password"
                                value={data.password}
                                onChange={(e) =>
                                    setData("password", e.target.value)
                                }
                                required
                                isFocused
                                autoComplete="password"
                            />

                            <InputError
                                message={errors.password}
                                className="mt-2"
                            />
                        </div>

                        <InputError
                            message={errors.inviteCode}
                            className="mt-2"
                        />

                        <PrimaryButton disabled={processing}>
                            Submit
                        </PrimaryButton>
                    </form>
                </Card>
            </PageContainer>
        </GuestLayout>
    );
}
