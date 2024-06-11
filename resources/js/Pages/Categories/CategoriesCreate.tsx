import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, useForm } from "@inertiajs/react";
import { PageProps } from "@/types";
import { BaseSyntheticEvent } from "react";
import PrimaryButton from "@/Components/PrimaryButton";
import TextField from "@/Components/Forms/TextField";
import Card from "@/Components/Card";
import PageContainer from "@/Components/PageContainer";
import { Routes } from "@/types/routes";
import { Category } from "@/types/categories/category";
import SecondaryButton from "@/Components/SecondaryButton";
import DangerButton from "@/Components/DangerButton";

export interface CategoriesCreateProps extends PageProps {}

export default function CategoriesCreate({ auth }: CategoriesCreateProps) {
    const { post, reset, data, setData, errors, processing, transform } =
        useForm({
            name: "",
            description: "",
            subCategories: [{ name: "", description: "" }] as Category[],
        });

    const submit = (e: BaseSyntheticEvent) => {
        e.preventDefault();
        post(route("categories.store"), { onSuccess: () => reset() });
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={{ name: "New Category", backButton: Routes.CATEGORIES }}
        >
            <Head title="New Category" />

            <PageContainer>
                <form onSubmit={submit} className="space-y-6">
                    <Card
                        heading="Create new Category"
                        subheading="Categories allow you to group your products together at a high-level."
                    >
                        <div className="mt-6 space-y-6 flex flex-col justify-center w-6/12">
                            <TextField
                                fullWidth
                                name="name"
                                value={data.name}
                                errors={errors.name}
                                label="Name"
                                onChange={(e: any) =>
                                    setData("name", e.target.value)
                                }
                            />

                            <TextField
                                fullWidth
                                name="description"
                                value={data.description}
                                errors={errors.description}
                                label="Description"
                                onChange={(e: any) =>
                                    setData("description", e.target.value)
                                }
                            />
                        </div>
                    </Card>

                    <Card
                        heading="Sub-Categories"
                        subheading="These are your more specific categories that products will be placed into"
                    >
                        <div className="mt-6 flex flex-col justify-center w-full gap-4 space-y-4">
                            {data.subCategories.map((subCategory, index) => (
                                <>
                                    <div className="flex flex-col space-y-2 w-6/12">
                                        <TextField
                                            fullWidth
                                            name={`subCategories[${index}].name`}
                                            value={subCategory.name}
                                            errors={
                                                (errors as any)[
                                                    `subCategories.${index}.name`
                                                ]
                                            }
                                            label="Name"
                                            onChange={(e: any) => {
                                                setData(
                                                    "subCategories",
                                                    (() => {
                                                        const newSubCategories =
                                                            [
                                                                ...data.subCategories,
                                                            ];

                                                        newSubCategories[
                                                            index
                                                        ].name = e.target.value;

                                                        return newSubCategories;
                                                    })()
                                                );
                                            }}
                                        />

                                        <TextField
                                            fullWidth
                                            name={`subCategories[${index}].description`}
                                            value={
                                                subCategory.description || ""
                                            }
                                            errors={
                                                (errors as any)[
                                                    `subCategories.${index}.description`
                                                ]
                                            }
                                            label="Description"
                                            onChange={(e: any) => {
                                                setData(
                                                    "subCategories",
                                                    (() => {
                                                        const newSubCategories =
                                                            [
                                                                ...data.subCategories,
                                                            ];

                                                        newSubCategories[
                                                            index
                                                        ].description =
                                                            e.target.value;

                                                        return newSubCategories;
                                                    })()
                                                );
                                            }}
                                        />

                                        {index > 0 && (
                                            <DangerButton
                                                type="button"
                                                onClick={() =>
                                                    setData(
                                                        "subCategories",
                                                        (() => {
                                                            const newSubCategories =
                                                                [
                                                                    ...data.subCategories,
                                                                ];
                                                            newSubCategories.splice(
                                                                index,
                                                                1
                                                            );
                                                            return newSubCategories;
                                                        })()
                                                    )
                                                }
                                            >
                                                Delete
                                            </DangerButton>
                                        )}
                                    </div>
                                </>
                            ))}
                        </div>

                        <SecondaryButton
                            className="mt-4"
                            onClick={() => {
                                setData("subCategories", [
                                    ...data.subCategories,
                                    {
                                        name: "",
                                        description: "",
                                    } as Category,
                                ]);
                            }}
                            type="button"
                        >
                            Add Sub-Category
                        </SecondaryButton>
                    </Card>
                    <PrimaryButton className="mt-4" disabled={processing}>
                        Add Category
                    </PrimaryButton>
                </form>
            </PageContainer>
        </AuthenticatedLayout>
    );
}
